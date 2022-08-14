@include('includes.user.header')

<div class="white section round">
    <h5>Referral list.</h5>
    <div style="overflow-y: auto;" class="margint">
        <table style="width:100%" class="striped">

            <tr style="background: #F9F9FA; border-top: 1px solid #F1F1F1">
                <th>ID#</th>
                <th style="min-width: 150px">Name</th>
                <th style="min-width: 150px">Email</th>
                <th style="min-width: 150px">Gender</th>
                <th style="min-width: 100px">Verified at</th>
            </tr>
            @if(count($users) == 0)
            <tr>
                <td colspan="5">You have no profits.</td>
            </tr>
            @endif
            @foreach($users as $row)
            @php
            $id = 0;
            $id++;
            @endphp
            <tr>
                <td>{{ $id }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->email }}</td>

                <td>{{ $row->gender }}</td>
               
                <td> <i class="fa fa-clock-o text-green"></i> {{ friendly_time($row->email_verified_at) }}</td>
            </tr>
            @endforeach

            <tr>
                <td colspan="5">
                   
                    {{ $users->links('vendor.pagination.custom-user') }} 
                  
                </td>
            </tr>
                
                 </table>
    </div>

@include('includes.user.footer')