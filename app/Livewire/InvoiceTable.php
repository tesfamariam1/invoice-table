<?php

namespace App\Livewire;

use Livewire\Component;

class InvoiceTable extends Component
{
    public $invoices;
    public $activeTab = 'all';
    public $dropdown = [];

    public function mount()
    {
        $this->invoices = collect([
            ['id' => 1, 'amount' => 200, 'currency' => 'USD', 'invoice_number' => 'F2A92B18-001', 'email' => 'john@example.com', 'status' => 'draft', 'date' => '2024-02-10', 'due' => '-'],
            ['id' => 2, 'amount' => 350, 'currency' => 'USD', 'invoice_number' => 'D4C79321-002', 'email' => 'jane@example.com', 'status' => 'paid', 'date' => '2024-02-11', 'due' => '-'],
            ['id' => 3, 'amount' => 350, 'currency' => 'USD', 'invoice_number' => 'B9E67D54-003', 'email' => 'jane@example.com', 'status' => 'paid', 'date' => '2024-02-11', 'due' => '-'],
            ['id' => 4, 'amount' => 350, 'currency' => 'USD', 'invoice_number' => 'C1A45832-004', 'email' => 'jane@example.com', 'status' => 'paid', 'date' => '2024-02-12', 'due' => '-'],
            ['id' => 5, 'amount' => 350, 'currency' => 'USD', 'invoice_number' => 'E7D50391-005', 'email' => 'jane@example.com', 'status' => 'paid', 'date' => '2024-02-14', 'due' => '-'],
            ['id' => 6, 'amount' => 350, 'currency' => 'USD', 'invoice_number' => 'C8E50176-009', 'email' => 'jane@example.com', 'status' => 'paid', 'date' => '2024-02-17', 'due' => '-'],
            ['id' => 7, 'amount' => 350, 'currency' => 'USD', 'invoice_number' => 'B2F93470-010', 'email' => 'jane@example.com', 'status' => 'paid', 'date' => '2024-02-17', 'due' => '-'],
            ['id' => 8, 'amount' => 150, 'currency' => 'USD', 'invoice_number' => 'A4B60247-006', 'email' => 'doe@example.com', 'status' => 'outstanding', 'date' => '2024-02-14', 'due' => '-'],
            ['id' => 9, 'amount' => 400, 'currency' => 'USD', 'invoice_number' => 'F3C19860-007', 'email' => 'alice@example.com', 'status' => 'past_due', 'date' => '2024-02-16', 'due' => '-'],
            ['id' => 10, 'amount' => 500, 'currency' => 'USD', 'invoice_number' => 'D6A31482-008', 'email' => 'bob@example.com', 'status' => 'draft', 'date' => '2024-02-16', 'due' => '-'],
        ]);
    }

    public function setTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        $filteredInvoices = $this->activeTab === 'all'
            ? $this->invoices
            : ($this->activeTab === 'past_due'
                ? $this->invoices->where('status', 'past_due')
                : $this->invoices->where('status', $this->activeTab));

        return view('livewire.invoice-table', compact('filteredInvoices'));
    }
    // public function render()
    // {
    //     return view('livewire.invoice-table');
    // }
}
