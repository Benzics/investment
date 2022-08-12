@include('includes.user.header')

<div class="white section round">
    <h5>Investment History.</h5>
    <div style="overflow-y: auto;" class="margint">
        <table style="width:100%" class="striped">

            <tr style="background: #F9F9FA; border-top: 1px solid #F1F1F1">
                <th>ID#</th>
                <th style="min-width: 150px">Date</th>
                <th style="min-width: 150px">Status</th>
                <th style="min-width: 100px">Amount</th>
                <th style="min-width: 100px">Investment Plan</th>
            </tr>
            @if(count($investments) == 0)
            <tr>
                <td colspan="5">You have no investments. <a href="{{url('/user/new-investment')}}">Click Here</a> to start a new investment.</td>
            </tr>
            @endif
            @foreach($investments as $row)
            @php
            $id = 0;
            $id++;
            @endphp
            <tr>
                <td>{{ $id }}</td>
                <td>{{ $row->created_at }}</td>
                <td>
                    <span class="{{ map_status_class($row->status) }}" style="padding: 4px 10px">
                    <span class="small">{{ map_investment_status($row->status) }}</span></span>
                </td>
                <td>{{$row->amount}} - {{ $currency }}</td>
                <td>{{$row->name}}</td>
            </tr>
            @endforeach

            <tr>
                <td colspan="5">
                   
                    {{ $investments->links('vendor.pagination.custom-user') }} 
                  
                </td>
            </tr>
                
                 </table>
    </div>

@include('includes.user.footer')