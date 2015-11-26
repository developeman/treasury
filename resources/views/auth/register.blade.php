@extends('front.sidebar')

@section('sidebar')
<!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-9">
            <h1>Create an account</h1>
            <div class="content-form-page">
              <div class="row">
                <div class="col-md-7 col-sm-7">
                @if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
        	{!! Form::open(['url'=>Url('/register'),'class'=>"form-horizontal",'role'=>'form']) !!}
          <div class="form-group">
              <label for="account_type" class="col-lg-4 control-label">Account Type</label>
              <div class="col-lg-8">
                {!! Form::select('account_type',['Individual'=>['Individual Account'],'Business or Organization'=>['Corporation','Partnership','Limited Liability Company (LLC)',' Professional Limited Liability Company (PLLC)','Sole Proprietorship'],'Estate or Trust'=>['Deceased Estate','Living Estate (Court-Appointed Only)','Trust']],null,['class'=>'form-control']) !!}
              </div>
            </div>
          <fieldset>
            <legend>Account Owner Information</legend>
            <div class="form-group">
              <label for="firstname" class="col-lg-4 control-label">First Name <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="text" name="firstname" class="form-control" required="required" id="firstname">
              </div>
            </div>
            <div class="form-group">
              <label for="midname" class="col-lg-4 control-label">Middle Name</label>
              <div class="col-lg-8">
                <input type="text" name="midname" class="form-control" id="midname">
              </div>
            </div>

            <div class="form-group">
              <label for="lastname" class="col-lg-4 control-label">Last Name <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="text" name="lastname" class="form-control" required="required" id="lastname">
              </div>
            </div>

            <div class="form-group">
              <label for="suffix" class="col-lg-4 control-label">Suffix </label>
              <div class="col-lg-3">
                {!! Form::select('suffix',['--','II','III','IV','JR','SR'],0,['class'=>"form-control"]) !!}
              </div>
            </div>

            <div class="form-group">
              <label for="account_name" class="col-lg-4 control-label">Account Name</label>
              <div class="col-lg-8">
                <input type="text" name="account_name" placeholder="Example: Mike's Account" class="form-control" id="account_name">
              </div>
            </div>
            <div class="form-group">
              <label for="account_name" class="col-lg-4 control-label">Taxpayer Number <span class="require">*</span></label>
              <div class="col-lg-2">
                <input type="text" maxlength="3" size="3" name="taxpayer_num[]" class="form-control" required="required" id="account_name">
              </div>
              <div style="float:left;margin:-7px 0 0 -5px; font-size:2em;width:1px;">-</div>
              <div class="col-lg-2">
                <input type="text" maxlength="2" size="2" name="taxpayer_num[]" class="form-control" required="required" id="account_name"> 
              </div>
              <div style="float:left;margin:-7px 0 0 -5px; font-size:2em;width:1px;">-</div>
              <div class="col-lg-2">
                <input type="text" maxlength="4" size="4" name="taxpayer_num[]" class="form-control" required="required" id="account_name">
              </div>
            </div>

            <div class="form-group">
              <label for="account_name" class="col-lg-4 control-label">Date of Birth<span class="require">*</span></label>
              <div class="col-lg-2">
                <input type="text" maxlength="2" size="2" name="date_of_birth[]" class="form-control" required="required" id="account_name">
              </div>
              <div style="float:left;margin:-7px 0 0 -5px; font-size:2em;width:1px;">-</div>
              <div class="col-lg-2">
                <input type="text" maxlength="2" size="2" name="date_of_birth[]" class="form-control" required="required" id="account_name"> 
              </div>
              <div style="float:left;margin:-7px 0 0 -5px; font-size:2em;width:1px;">-</div>
              <div class="col-lg-3">
                <input type="text" maxlength="4" size="4" name="date_of_birth[]" class="form-control" required="required" id="account_name">
              </div>
              <div style="float:left;margin:5px 0 0 -5px;width:1px;">(MM/DD/YYYY)</div>
            </div>
            <div class="form-group">
              <label for="driver_license" class="col-lg-4 control-label">Driver's License</label>
              <div class="col-lg-8">
                <input type="text" name="driver_license"  class="form-control" id="driver_license">
              </div>
            </div>
            <div class="form-group">
              <label for="issuing_state" class="col-lg-4 control-label">Issuing State</label>
              <div class="col-lg-3">
               <select name="issuing_state" class="form-control">                 
                  @include('front._states')
               </select> 
              </div>
            </div>
            <div class="form-group">
              <label for="account_name" class="col-lg-4 control-label">Expiration Date<span class="require">*</span></label>
              <div class="col-lg-2">
                <input type="text" maxlength="2" size="2" name="expiration_date[]" class="form-control" required="required" id="account_name">
              </div>
              <div style="float:left;margin:-7px 0 0 -5px; font-size:2em;width:1px;">-</div>
              <div class="col-lg-2">
                <input type="text" maxlength="2" size="2" name="expiration_date[]" class="form-control" required="required" id="account_name"> 
              </div>
              <div style="float:left;margin:-7px 0 0 -5px; font-size:2em;width:1px;">-</div>
              <div class="col-lg-3">
                <input type="text" maxlength="4" size="4" name="expiration_date[]" class="form-control" required="required" id="account_name">
              </div>
              <div style="float:left;margin:5px 0 0 -5px;width:1px;">(MM/DD/YYYY)</div>
            </div>
            <div class="form-group">
              <label for="email" class="col-lg-4 control-label">Email <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="mail" name="email" required  class="form-control" id="email">
              </div>
            </div>
            <div class="form-group">
              <label for="email" class="col-lg-4 control-label">Retype Email <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="email_conf" name="email_conf" required class="form-control" id="email">
              </div>
            </div>
          </fieldset>
          
          <fieldset>
            <legend>Contact Information</legend>
            <div class="form-group">
              <label for="password" class="col-lg-4 control-label">Street Address <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="text" name="address1" class="form-control" requierd id="address">
                <input type="text" name="address2" class="form-control" id="address">
                <input type="text" name="address3" class="form-control" id="address">
              </div>
            </div>
            <div class="form-group">
              <label for="state" class="col-lg-4 control-label">State <span class="require">*</span></label>
              <div class="col-lg-3">
                <select name="state" class="form-control">                 
                  @include('front._states')
               </select>
              </div>
            </div>
            <div class="form-group">
              <label for="zipcode" class="col-lg-4 control-label">Zip Code <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="text" name="zipcode" required class="form-control" id="zipcode">
              </div>
            </div>
            <div class="form-group">
              <label for="account_name" class="col-lg-4 control-label">Phone<span class="require">*</span></label>
              <div style="float:left;margin: -7px -14px 0px 4px;font-size: 30px;">(</div>
              <div class="col-lg-2">
                <input type="text" maxlength="2" size="2" name="phone[]" class="form-control" required="required" id="account_name">
              </div>
                <div style="float:left;margin: -7px 4px 0px -14px;font-size: 30px;">)</div>
              <div class="col-lg-2">
                <input type="text" maxlength="2" size="2" name="phone[]" class="form-control" required="required" id="account_name"> 
              </div>
             <div style="float:left;margin: -7px 0px 0px 0px;font-size: 30px;">-</div>
              <div class="col-lg-3">
                <input type="text" maxlength="4" size="4" name="phone[]" class="form-control" required="required" id="account_name">
              </div>
              <div style="float:left;margin:5px 0 0 -5px;width:1px;">(MM/DD/YYYY)</div>
            </div>
          </fieldset>

          <fieldset>
            <div class="form-group">
              <label for="bank_name" class="col-lg-4 control-label">Bank Name <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="text" name="bank_name" required class="form-control" id="bank_name">
              </div>
            </div>
            <div class="form-group">
              <label for="routing_number" class="col-lg-4 control-label">Routing Number <span class="require">*</span></label>
              <div class="col-lg-4">
                <input type="text" name="routing_number" maxlength="9" size="11" required class="form-control" id="routing_number">
              </div>
            </div>
            <div class="form-group">
              <label for="account_number" class="col-lg-4 control-label">Account Number <span class="require">*</span></label>
              <div class="col-lg-5">
                <input type="text" name="account_number" maxlength="17" size="17" required class="form-control" id="account_number">
              </div>
            </div>
            <div class="form-group">
              <label for="name_on_account" class="col-lg-4 control-label">Name(s) on the Account <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="text" name="name_on_account" required class="form-control" id="name_on_account">
              </div>
            </div>

            <div class="form-group">
              <label for="name_on_account" class="col-lg-4 control-label">Account Type<span class="require">*</span></label>
              <div class="col-lg-8">
              <div class="radio @if($errors->first('bank_account_type')) has-error @endif">
                <label for="bank_account_type">
                    {!! Form::radio('bank_account_type', 0,  0, ['id' => 'radio_id']) !!}Checking</label>
                <label for="bank_account_type">
                    {!! Form::radio('bank_account_type', 1,  0, ['id' => 'radio_id']) !!}Savings</label>
                <small class="text-danger">{{ $errors->first('bank_account_type') }}</small>
            </div>  
              </div>
            </div>
            
            
          </fieldset>
          
          <div class="portlet box red" style="border: 1px solid #E94D1C;border-top: 0;">
            <div class="portlet-title" style="background:#E94D1C;border-top: 0;">
              <div class="caption">
                 Taxpayer Identification Number Certification
              </div>
            </div>
            <div class="portlet-body">
              <p><input type="checkbox" name="agree" required="required" value="true"> <strong>By checking this box I certify, under penalty of perjury, that:</strong></p>
              <ol>
                  <li>The number shown on this form is my correct taxpayer identification number.</li>
                  <li><strong>I am not</strong> subject to backup withholding because:  (a) I am exempt from backup withholding, (b) I have not been notified by the Internal Revenue Service (IRS) that I am subject to backup withholding as a result of failure to report all interest and dividends, or (c) the IRS has notified me that I am no longer subject to backup withholding.</li>
                  <li>I am a U.S. person.</li>
              </ol>
               <br>
            </div>
          </div>


          <div class="row">
            <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">                        
              <button type="submit" class="btn btn-primary">Create an account</button>
              <button type="button" class="btn btn-default">Cancel</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-4 col-sm-4 pull-right">
        <div class="form-info">
          <h2><em>Important</em> Information</h2>
          <p>Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed sit nonumy nibh sed euismod ut laoreet dolore magna aliquarm erat sit volutpat. Nostrud exerci tation ullamcorper suscipit lobortis nisl aliquip  commodo quat.</p>

          <p>Duis autem vel eum iriure at dolor vulputate velit esse vel molestie at dolore.</p>

          <button type="button" class="btn btn-default">More details</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection





          


              
         