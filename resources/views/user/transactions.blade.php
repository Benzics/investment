@include('includes.user.header')

<div class="white section round">
    <h5>Transaction History.</h5>
    <div style="overflow-y: auto;" class="margint">
        <table style="width:100%" class="striped">

            <tr style="background: #F9F9FA; border-top: 1px solid #F1F1F1">
                <th>ID#</th>
                <th style="min-width: 150px">Date</th>
                <th style="min-width: 150px">Type</th>
                <th style="min-width: 100px">Credit</th>
                <th style="min-width: 100px">Debit</th>
                <th style="min-width: 100px">Balance</th>
                <th style="min-width: 100px">Description</th>
            </tr>
            @if(count($transactions) == 0)
            <tr>
                <td colspan="7">You have no transactions.</td>
            </tr>
            @endif
            @foreach($transactions as $row)
            @php
            $id = 0;
            $id++;
            @endphp
            <tr>
                <td>{{ $id }}</td>
                <td>{{ friendly_time($row->created_at) }}</td>
                <td>
                    <span class="blue" style="padding: 4px 10px">
                    <span class="small">{{ map_transaction_type($row->type) }}</span></span>
                </td>
                <td>+{{ $currency . number_format($row->credit, 2) }}</td>
                <td>-{{ $currency . number_format($row->debit, 2)}}</td>
                <td>{{ $currency . number_format($row->balance, 2)}}</td>
                <td>{{ $row->description }}</td>
            </tr>
            @endforeach

            <tr>
                <td colspan="7">
                   
                    {{ $transactions->links('vendor.pagination.custom-user') }} 
                  
                </td>
            </tr>
                
                 </table>
    </div>

@include('includes.user.footer')