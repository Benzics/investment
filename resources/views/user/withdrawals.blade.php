@include('includes.user.header')

<div class="white section round">
    <h5>Withdrawal History.</h5>
    <div style="overflow-y: auto;" class="margint">
        <table style="width:100%" class="striped">

            <tr style="background: #F9F9FA; border-top: 1px solid #F1F1F1">
                <th>ID#</th>
                <th style="min-width: 150px">Date</th>
                <th style="min-width: 150px">Status</th>
                <th style="min-width: 100px">Amount</th>
                <th style="min-width: 100px">Payment Method</th>
            </tr>
            @if(count($withdrawals) == 0)
            <tr>
                <td colspan="5">You have no withdrawals. <a href="{{url('/user/withdraw')}}">Click Here</a> to make a withdrawal.</td>
            </tr>
            @endif
            @foreach($withdrawals as $row)
            @php
            $id = 0;
            $id++;
            @endphp
            <tr>
                <td>{{ $id }}</td>
                <td>{{ friendly_time($row->created_at) }}</td>
                <td>
                    <span class="{{ map_withdrawal_status_class($row->status) }}" style="padding: 4px 10px">
                    <span class="small">{{ map_withdrawal_status($row->status) }}</span></span>
                </td>
                <td>{{$row->amount}} - {{ $currency }}</td>
                <td>{{$row->name}}</td>
            </tr>
            @endforeach

            <tr>
                <td colspan="5">
                   
                    {{ $withdrawals->links('vendor.pagination.custom-user') }} 
                  
                </td>
            </tr>
                
                 </table>
    </div>
</div>

@include('includes.user.footer')