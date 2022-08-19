@include('includes.admin.header')


    <div class="container vh">
        <nav aria-label="breadcrumb" class="mt-3">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
              
              <li class="breadcrumb-item active" aria-current="page">{{ $page_title }}</li>
            </ol>
        </nav>
        <h2 class="mt-4 b-3 page-title">{{ $page_title }} ( <small class="text-muted">All fields here are required, only change what you need.</small> )</h2>

      
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="admin-mail">Admin Email <span class="text-danger">*</span></label>
                        <input type="email" name="admin-mail" required id="admin-mail" value="{{ old('admin-mail', $settings['admin-mail']) }}" class="form-control" placeholder="Admin email address">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="support-mail">Support Mail <span class="text-danger">*</span></label>
                        <input type="text" required class="form-control" value="{{ old('support-mail', $settings['support-mail']) }}" name="support-mail" placeholder="Support email address">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="site-name">Site Name <span class="text-danger">*</span></label>
                        <input type="text" required class="form-control" value="{{ old('site-name', $settings['site-name']) }}" name="site-name" placeholder="Site name to be used in titles">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="currency">Currency <span class="text-danger">*</span></label>
                       <select name="currency" id="currency" class="form-control">
                        @foreach($currencies as $row)
                        <option value="{{$row->id}}" {{$settings['currency'] == $row->id ? 'selected' : ''}}> {{$row->short_code}}</option>
                        @endforeach
                       </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address">Contact Address <span class="text-danger">*</span> <i class="fas fa-question-circle" data-toggle="tooltip" title="Usually displayed on the site footer."></i></label>
                        <textarea name="address" required id="address" placeholder="Site contact address" class="form-control">{{$settings['address']}}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone">Contact Phone Number <span class="text-danger">*</span> <i class="fas fa-question-circle" data-toggle="tooltip" title="Usually displayed on the site footer."></i></label>
                        <textarea name="phone" required id="phone" placeholder="Site contact phone" class="form-control">{{$settings['phone']}}</textarea>
                    </div>
                </div>
            </div>
            <fieldset>
                <legend>Withdrawal Charges <i class="fas fa-question-circle" data-toggle="tooltip" title="Amount to charge users making withdrawals, set to zero(0) if you dont want charges."></i></legend>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="withdrawal-charge">Amount to charge <span class="text-danger">*</span></label>
                            <input type="text" required class="form-control" value="{{ old('withdrawal-charge', $settings['withdrawal-charges']->amount) }}" name="withdrawal-charge" placeholder="Withdrawal charge amount">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="withdrawal-charge-type">Charge Type <span class="text-danger">*</span></label>
                        <select name="withdrawal-charge-type" id="withdrawal-charge-type" class="form-control">
                        
                            <option value="0" {{ old('withdrawal-charge-type', $settings['withdrawal-charges']->type) == 0 ? 'selected' : ''}}> Percentage</option>
                            <option value="1" {{ old('withdrawal-charge-type', $settings['withdrawal-charges']->type) == 1 ? 'selected' : ''}}> Fixed Price</option>
                            
                        </select>
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>Deposit Charges
                    <i class="fas fa-question-circle" data-toggle="tooltip" title="Amount to charge users making deposits, set to zero(0) if you dont want charges."></i>
                    </legend>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="deposit-charge">Amount to charge <span class="text-danger">*</span></label>
                            <input type="text" required class="form-control" value="{{ old('deposit-charge', $settings['deposit-charges']->amount) }}" name="deposit-charge" placeholder="Deposit charge amount">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="withdrawal-charge-type">Charge Type <span class="text-danger">*</span>
                                <i class="fas fa-question-circle" data-toggle="tooltip" title="When set to a fixed price, users will be charged the amount you specified."></i>
                            </label>
                        <select name="deposit-charge-type" id="deposit-charge-type" class="form-control">
                        
                            <option value="0" {{ old('deposit-charge-type', $settings['deposit-charges']->type) == 0 ? 'selected' : ''}}> Percentage</option>
                            <option value="1" {{ old('deposit-charge-type', $settings['deposit-charges']->type) == 1 ? 'selected' : ''}}> Fixed Price</option>
                            
                        </select>
                        </div>
                    </div>
                </div>
            </fieldset>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="minimum-withdrawal">Minimum Withdrawal <span class="text-danger">*</span>
                            <i class="fas fa-question-circle" data-toggle="tooltip" title="The minimum amount users can withdraw from the site"></i>
                        </label>
                        <input type="text" required class="form-control" value="{{ old('minimum-withdrawal', $settings['minimum-withdrawal']) }}" name="minimum-withdrawal" placeholder="Minimum withdrawal">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="maximum-withdrawal">Maximum Withdrawal <span class="text-danger">*</span>
                            <i class="fas fa-question-circle" data-toggle="tooltip" title="The maximum amount users can withdraw from the site"></i>
                        </label>
                        <input type="text" required class="form-control" value="{{ old('maximum-withdrawal', $settings['maximum-withdrawal']) }}" name="maximum-withdrawal" placeholder="Maximum withdrawal">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="withdrawal-time">Withdrawal processing days <span class="text-danger">*</span>
                            <i class="fas fa-question-circle" data-toggle="tooltip" title="The average amount of days withdrawals take to be processed"></i>
                        </label>
                        <input type="text" required class="form-control" value="{{ old('withdrawal-time', $settings['withdrawal-time']) }}" name="withdrawal-time" placeholder="Withdrawal time">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="referral-bonus">Referral Bonus <span class="text-danger">*</span>
                            <i class="fas fa-question-circle" data-toggle="tooltip" title="Amount to give users for every referral. Set to Zero(0) if you want to disable this."></i>
                        </label>
                        <input type="text" required class="form-control" value="{{ old('referral-bonus', $settings['referral-bonus']) }}" name="referral-bonus" placeholder="Referral bonus">
                    </div>
                </div>
            </div>

            <fieldset>
                <legend>Notification settings</legend>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox"
                                {{ old('deposit-notification', $settings['deposit-notification']) == 1 ? 'checked' : '' }} 
                                 name="deposit-notification" class="custom-control-input" id="deposit-notification">
                                <label class="custom-control-label" for="deposit-notification">New Deposits
                                    <i class="fas fa-question-circle" data-toggle="tooltip" title="Get notified by mail everytime a user makes a deposit, and also notify the user of their deposit"></i>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" 
                                {{ old('investment-notification', $settings['investment-notification']) == 1 ? 'checked' : '' }} 
                                name="investment-notification" class="custom-control-input" id="investment-notification">
                                <label class="custom-control-label" for="investment-notification">New Investments
                                    <i class="fas fa-question-circle" data-toggle="tooltip" title="Get notified by mail everytime a user makes an investment, and also notify the user of their investment"></i>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" 
                                {{ old('withdrawal-notification', $settings['withdrawal-notification']) == 1 ? 'checked' : '' }} 
                                name="withdrawal-notification" class="custom-control-input" id="withdrawal-notification">
                                <label class="custom-control-label" for="withdrawal-notification">New Withdrawals
                                    <i class="fas fa-question-circle" data-toggle="tooltip" title="Get notified by mail everytime a user makes an withdrawal, and also notify the user of their withdrawal"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>

            <div class="form-group">
                <label for="site-logo-1">Website Logo 
                    <i class="fas fa-question-circle" data-toggle="tooltip" title="This is the logo displayed on the header of your pages"></i>
                </label>
                <input type="file" class="form-control" name="site-logo-1" id="site-logo-1">
                <small class="text-muted">{{$settings['site-logo-1']}}</small>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="site-logo-2">Website Logo 2  <i class="fas fa-question-circle" data-toggle="tooltip" title="This is the logo usually displayed on the footer of your pages"></i></label>
                        <input type="file" class="form-control" name="site-logo-2" id="site-logo-2">
                        <small class="text-muted">{{$settings['site-logo-2']}}</small>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="site-logo-3">Website Logo 3( <small class="text-muted">Certificate</small> )
                            <i class="fas fa-question-circle" data-toggle="tooltip" title="If your website has a certificate image, upload it here"></i></label>
                        <input type="file" class="form-control" name="site-logo-3" id="site-logo-3">
                        <small class="text-muted">{{$settings['site-logo-3']}}</small>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button class="btn btn-primary">Update Settings</button>
            </div>
        </form>
    </div>


@include('includes.admin.footer')