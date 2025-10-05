<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'type' => 'required|in:income,expense',
            'category' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0.01',
            'notes' => 'nullable|string',
        ]);

        $validated['user_id'] = Auth::id();

        Transaction::create($validated);

        return redirect()->route('dashboard')->with('success', 'Transaction added successfully!');
    }

    public function update(Request $request, Transaction $transaction)
    {
        if ($transaction->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'date' => 'required|date',
            'type' => 'required|in:income,expense',
            'category' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0.01',
            'notes' => 'nullable|string',
        ]);

        $transaction->update($validated);

        return redirect()->route('dashboard')->with('success', 'Transaction updated successfully!');
    }

    public function destroy(Transaction $transaction)
    {
        if ($transaction->user_id !== Auth::id()) {
            abort(403);
        }

        $transaction->delete();

        return redirect()->route('dashboard')->with('success', 'Transaction deleted successfully!');
    }

    public function exportCSV(Request $request)
    {
        $user = Auth::user();
        
        // Get filter parameters
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $type = $request->input('type');
        
        // Build query
        $query = Transaction::where('user_id', $user->id)
            ->orderBy('date', 'desc')
            ->orderBy('created_at', 'desc');
        
        // Apply filters
        if ($startDate) {
            $query->whereDate('date', '>=', $startDate);
        }
        
        if ($endDate) {
            $query->whereDate('date', '<=', $endDate);
        }
        
        if ($type && in_array($type, ['income', 'expense'])) {
            $query->where('type', $type);
        }
        
        $transactions = $query->get();
        
        // Generate CSV filename
        $filename = 'transactions_' . date('Y-m-d_His') . '.csv';
        
        // Create CSV content
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0'
        ];
        
        $callback = function() use ($transactions) {
            $file = fopen('php://output', 'w');
            
            // Add UTF-8 BOM for Excel compatibility
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
            
            // Add header row
            fputcsv($file, ['Date', 'Type', 'Category', 'Amount', 'Notes', 'Created At']);
            
            // Add data rows
            foreach ($transactions as $transaction) {
                fputcsv($file, [
                    $transaction->date->format('Y-m-d'),
                    ucfirst($transaction->type),
                    $transaction->category,
                    number_format($transaction->amount, 2, '.', ''),
                    $transaction->notes ?? '',
                    $transaction->created_at->format('Y-m-d H:i:s')
                ]);
            }
            
            fclose($file);
        };
        
        return Response::stream($callback, 200, $headers);
    }
}