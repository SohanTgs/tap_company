@extends($activeTemplate.'layouts.app')

@section('panel')

<div class="main-content"><h3 align='center'>{{ $page_title }}</h3>
        <section class="section">
          <div class="section-body">
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-4">
                <div class="card author-box">
                  <div class="card-body">
                    <div class="author-box-center">
                    @if($user->image == null)
                        <img alt="image" src="{{ getImage('assets/images/user/profile/'.'default.png')}}" class="rounded-circle author-box-picture">
                    @else
                        <img alt="image" src="{{ getImage('assets/images/user/profile/'. $user->image)}}" class="rounded-circle author-box-picture">
                    @endif
                      <div class="clearfix"></div>
                      <div class="author-box-name">
                        <a href="javascript:void(0)">{{ __($user->firstname.' '.$user->lastname) }}</a>
                      </div>
                      <div class="author-box-job">{{ __(showDateTime($user->created_at)) }}</div>
                    </div>
                    <div class="text-center">
                      <div class="author-box-description">
                        <p>
                            <h4>{{ __($user->username) }}</h4>
                        </p>
                      </div>
                      <div class="mb-2 mt-3">
                        <div class="text-small font-weight-bold"></div>
                      </div>
                      <a href="#" class="btn btn-social-icon mr-1 btn-facebook">
                        <i class="fab fa-facebook-f"></i>
                      </a>
                      <a href="#" class="btn btn-social-icon mr-1 btn-twitter">
                        <i class="fab fa-twitter"></i>
                      </a>
                      <a href="#" class="btn btn-social-icon mr-1 btn-github">
                        <i class="fab fa-github"></i>
                      </a>
                      <a href="#" class="btn btn-social-icon mr-1 btn-instagram">
                        <i class="fab fa-instagram"></i>
                      </a>
                      <div class="w-100 d-sm-none"></div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h4>Personal Details</h4>
                  </div>
                  <div class="card-body">
                    <div class="py-4">
                      <p class="clearfix">
                        <span class="float-left">
                          Balance
                        </span>
                        <span class="float-right text-muted">
                          <b>{{ number_format(__($user->balance),2) }}</b>
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Phone
                        </span>
                        <span class="float-right text-muted">
                          {{ __($user->mobile) }}
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Mail
                        </span>
                        <span class="float-right text-muted">
                          {{ __($user->email) }}
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Status
                        </span>
                        <span class="float-right text-muted">
                         @if($user->status == 1)
                            Active
                         @else
                            Banned
                         @endif
                        </span>
                      </p>
                       <p class="clearfix">
                        <span class="float-left">
                          Upline
                        </span>
                        <span class="float-right text-muted">
                            @if( $upline != 'No Upline' )
            {{ $upline->upline->fullname }} / {{ $upline->upline->email }} / {{ $upline->upline->mobile }}
                            @else
                                {{ $upline }}
                            @endif
                        </span>
                      </p>

                    </div>
                  </div>
                </div>
                <div class="card">


                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-8">
                <div class="card">
                  <div class="padding-20">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                          aria-selected="true">About</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                          aria-selected="false">Setting</a>
                      </li>
                    </ul>
                    <div class="tab-content tab-bordered" id="myTab3Content">
                      <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                        <div class="row">
                          <div class="col-md-3 col-6 b-r">
                            <strong>Full Name</strong>
                            <br>
                            <p class="text-muted">{{ __($user->firstname.' '.$user->lastname) }}</p>
                          </div>
                          <div class="col-md-3 col-6 b-r">
                            <strong>Mobile</strong>
                            <br>
                            <p class="text-muted">{{ __($user->mobile) }}</p>
                          </div>
                          <div class="col-md-3 col-6 b-r">
                            <strong>Email</strong>
                            <br>
                            <p class="text-muted">{{ __($user->email) }}</p>
                          </div>
                          <div class="col-md-3 col-6">
                            <strong>Referral</strong>
                            <br>
                            @if($user->ref_by == null)
                                <p class="text-muted">None</p>
                            @else
                                 <p class="text-muted">{{ __($user->refName->username) }}</p>
                            @endif
                          </div>
                        </div>
                        <p class="m-t-30"></p>

                      <div class="section-title">

            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card card-dark">
                    <div class="card-header">
                        <h4>Total Deposit</h4>
                    </div>
                    <div class="card-body">
                        <p>{{ number_format($deposit,2) }} {{ $general->cur_text }}</p>
                        <a href="{{ route('user.deposit.history') }}" class="btn btn-primary">Histories</a>
                    </div>
                    </div>
                </div>
                 <div class="col-12 col-md-6 col-lg-3">
                    <div class="card card-dark">
                    <div class="card-header">
                        <h4>Total Withdraw</h4>
                    </div>
                    <div class="card-body">
                        <p>{{ number_format($withdraw,2) }} {{ $general->cur_text }}</p>
                        <a href="{{ route('user.withdraw.history') }}" class="btn btn-primary">Histories</a>
                    </div>
                    </div>
                </div>
                 <div class="col-12 col-md-6 col-lg-3">
                    <div class="card card-dark">
                    <div class="card-header">
                        <h4>Email Verification</h4>
                    </div>
                    <div class="card-body">
                        @if($user->ev == 1)
                            <p>Verified</p>
                        @else
                            <p>Unverified</p>
                        @endif
                    </div>
                    </div>
                </div>
                 <div class="col-12 col-md-6 col-lg-3">
                    <div class="card card-dark">
                    <div class="card-header">
                        <h4>Sms Verification</h4>
                    </div>
                    <div class="card-body">
                        @if($user->sv == 1)
                            <p>Verified</p>
                        @else
                            <p>Unverified</p>
                        @endif
                    </div>
                    </div>
                </div>
            </div>
                      </div>

                      </div>
                      <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">

     <form class="register needs-validation" action="" method="post" enctype="multipart/form-data">
                        @csrf
                          <div class="card-header">
                            <h4>Edit Profile</h4>
                          </div>
                          <div class="card-body">
                            <div class="row">
                              <div class="form-group col-md-6 col-12">
                               <label for="InputFirstname" class="col-form-label">@lang('First Name:')</label>
                                <input type="text" class="form-control" id="InputFirstname" name="firstname"
                                           placeholder="@lang('First Name')" value="{{$user->firstname}}" >
                                <div class="invalid-feedback">
                                  Please fill in the first name
                                </div>
                              </div>
                              <div class="form-group col-md-6 col-12">
                              <label for="lastname" class="col-form-label">@lang('Last Name:')</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname"
                                           placeholder="@lang('Last Name')" value="{{$user->lastname}}">
                                <div class="invalid-feedback">
                                  Please fill in the last name
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-6 col-12">
                               <label for="email" class="col-form-label">@lang('E-mail Address:')</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="@lang('E-mail Address')" value="{{$user->email}}" required="">
                                <div class="invalid-feedback">
                                  Please fill in the email
                                </div>
                              </div>
                              <div class="form-group col-md-6 col-12">
                                <label for="phone" class="col-form-label">@lang('Mobile Number')</label>
                                    <input type="tel" class="form-control pranto-control" id="phone" name="mobile" value="{{$user->mobile}}" placeholder="@lang('Your Contact Number')" required>
                              </div>
                            </div>

                             <div class="row">
                              <div class="form-group col-md-6 col-12">
                               <label for="address" class="col-form-label">@lang('Address:')</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                           placeholder="@lang('Address')" value="{{$user->address->address}}" required="">
                                <div class="invalid-feedback">
                                  Please fill in the email
                                </div>
                              </div>
                              <div class="form-group col-md-6 col-12">
                                <label for="state" class="col-form-label">@lang('State:')</label>
                                    <input type="text" class="form-control" id="state" name="state" placeholder="@lang('state')" value="{{$user->address->state}}" required="">
                              </div>
                            </div>

                            <div class="row">
                              <div class="form-group col-md-6 col-12">
                              <label for="zip" class="col-form-label">@lang('Zip Code:')</label>
                                    <input type="text" class="form-control" id="zip" name="zip" placeholder="@lang('Zip Code')" value="{{$user->address->zip}}" required="">
                                <div class="invalid-feedback">
                                  Please fill in the email
                                </div>
                              </div>
                              <div class="form-group col-md-6 col-12">
                                  <label for="city" class="col-form-label">@lang('City:')</label>
                                    <input type="text" class="form-control" id="city" name="city"
                                           placeholder="@lang('City')" value="{{$user->address->city}}" required="">
                              </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <div class="image-upload">
                                        <div class="thumb">

                                            <div class="avatar-edit">
                                                <input type="file" class="profilePicUpload" name="image" id="profilePicUpload1" accept=".png, .jpg, .jpeg">
                                                <label for="profilePicUpload1" class="bg--success">@lang('Upload Image')</label>
                                                <small class="mt-2 text-facebook">@lang('Supported files:') <b>@lang('jpeg, jpg.')</b> @lang('Image will be resized into 400x400px') </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            </div>

                          </div>
                          <div class="card-footer text-right">
                            <button class="btn btn-primary">Save Changes</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

      </div>

@endsection






