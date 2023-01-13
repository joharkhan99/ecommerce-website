<div class="container">
  <ul class="nav nav-tabs border-0  nav-tabs-02 justify-content-center mt-5 pt-3" id="home-6_tabs" role="tablist">
    <li class="nav-item mx-3" role="presentation">
      <button class="p-2 nav-link border rounded-1 active" id="h3_tabnav_1" data-bs-toggle="tab" data-bs-target="#h6_tab_1" type="button" role="tab" aria-controls="h6_tab_1" aria-selected="true">Start as Customer</button>
    </li>
    <li class="nav-item mx-3" role="presentation">
      <button class="p-2 nav-link border rounded-1" id="h3_tabnav_2" data-bs-toggle="tab" data-bs-target="#h6_tab_2" type="button" role="tab" aria-controls="h6_tab_2" aria-selected="false" tabindex="-1">Start as Vendor</button>
    </li>
  </ul><!-- End Tabs Nav -->
  <!-- Tab Content -->
  <div class="tab-content p-3 mt-4" id="home-6_tabsContent">
    <!-- Tab pane -->
    <div class="tab-pane fade active show" id="h6_tab_1" role="tabpanel" aria-labelledby="h3_tabnav_1">
      <div class="row g-3 g-lg-4">
        <div class="col-xl-8 mx-auto">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Customer Registration</h5>
            </div>
            <div class="card-body">
              <form action="{{ route('customer_registration') }}" method="POST" enctype="multipart/form-data">
                @if (session('customer_registrationerror'))
                <div class="card-body">
                  <div class="alert alert-success" role="alert" style="background: #f63c7a;color: #ffffff;text-align: center;">
                    {{ session('customer_registrationerror') }}
                  </div>
                </div>
                @endif
                @csrf


                <div class="mb-3">
                  <label class="form-label" for="profile_image">Profile Image</label>
                  <div class="input-group input-group-merge">
                    <input type="file" class="form-control" name="profile_image" required>
                  </div>
                  <div class="form-text">Please choose profile image from your device.</div>
                </div>

                <div class="mb-3">
                  <div class="row">
                    <div class="col-md-6">
                      <label class="form-label" for="fname">First Name</label>
                      <input type="text" class="form-control" name="fname" required placeholder="John">
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="lname">Last Name</label>
                      <input type="text" class="form-control" name="lname" required placeholder="Doe">
                    </div>
                  </div>
                </div>

                <div class="mb-3">
                  <label class="form-label" for="address">Postal Address</label>
                  <div class="input-group input-group-merge">
                    <input type="text" class="form-control" name="address" required placeholder="street 0, road">
                  </div>
                  <div class="form-text">Please enter your postal address.</div>
                </div>

                <div class="mb-3">
                  <div class="row">
                    <div class="col-md-6">
                      <label class="form-label" for="country">Country</label>
                      <input type="text" class="form-control" name="country" required placeholder="e.g. Pakistan">
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="city">City</label>
                      <input type="text" class="form-control" name="city" required placeholder="Lahore">
                    </div>
                  </div>
                </div>

                <div class="mb-3">
                  <div class="row">
                    <div class="col-md-6">
                      <label class="form-label" for="state">State</label>
                      <input type="text" class="form-control" name="state" required placeholder="Punjab">
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="postal_code">Postal Code</label>
                      <input type="text" class="form-control" name="postal_code" required placeholder="e.g: 10040">
                    </div>
                  </div>
                </div>

                <div class="mb-3">
                  <div class="row">
                    <div class="col-md-6">
                      <label class="form-label" for="phone">Phone</label>
                      <input type="text" class="form-control" name="phone" required placeholder="+92300000000">
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="email">Email address</label>
                      <input type="text" class="form-control" name="email" required placeholder="john.doe@gmail.com">
                    </div>
                  </div>
                </div>

                <button type="submit" class="btn btn-primary d-block w-100 mt-5">Start</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div><!-- Tab Pane -->


    <div class="tab-pane fade" id="h6_tab_2" role="tabpanel" aria-labelledby="h3_tabnav_2">
      <div class="row g-3 g-lg-4">
        <div class="col-xl-8 mx-auto">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Vendor Registration</h5>
            </div>
            <div class="card-body">
              <form action="{{ route('vendor_registration') }}" method="POST" enctype="multipart/form-data">
                @if (session('vendor_registrationerror'))
                <div class="card-body">
                  <div class="alert alert-success" role="alert" style="background: #f63c7a;color: #ffffff;text-align: center;">
                    {{ session('vendor_registrationerror') }}
                  </div>
                </div>
                @endif
                @csrf


                <div class="mb-3">
                  <label class="form-label" for="logo">Shop Logo</label>
                  <div class="input-group input-group-merge">
                    <input type="file" class="form-control" name="logo" required>
                  </div>
                  <div class="form-text">Please choose shop logo image from your device.</div>
                </div>

                <div class="mb-3">
                  <label class="form-label" for="comp_name">Company/Shop Name</label>
                  <input type="text" class="form-control" name="comp_name" placeholder="e.g. Hugo Boss" required>
                </div>

                <div class="mb-3">
                  <div class="row">
                    <div class="col-md-6">
                      <label class="form-label" for="fname">First Name</label>
                      <input type="text" class="form-control" name="fname" placeholder="John" required>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="lname">Last Name</label>
                      <input type="text" class="form-control" name="lname" placeholder="Doe" required>
                    </div>
                  </div>
                </div>

                <div class="mb-3">
                  <label class="form-label" for="address">Postal Address</label>
                  <div class="input-group input-group-merge">
                    <input type="text" class="form-control" name="address" required placeholder="street 0, road">
                  </div>
                  <div class="form-text">Please enter your postal address.</div>
                </div>

                <div class="mb-3">
                  <div class="row">
                    <div class="col-md-6">
                      <label class="form-label" for="country">Country</label>
                      <input type="text" class="form-control" name="country" placeholder="e.g. Pakistan" required>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="city">City</label>
                      <input type="text" class="form-control" name="city" placeholder="Lahore" required>
                    </div>
                  </div>
                </div>

                <div class="mb-3">
                  <div class="row">
                    <div class="col-md-6">
                      <label class="form-label" for="state">State</label>
                      <input type="text" class="form-control" name="state" placeholder="Punjab" required>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="postal_code">Postal Code</label>
                      <input type="text" class="form-control" name="postal_code" placeholder="e.g: 10040" required>
                    </div>
                  </div>
                </div>

                <div class="mb-3">
                  <div class="row">
                    <div class="col-md-6">
                      <label class="form-label" for="phone">Phone</label>
                      <input type="text" class="form-control" name="phone" placeholder="+92300000000" required>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="email">Email address</label>
                      <input type="text" class="form-control" name="email" placeholder="john.doe@gmail.com" required>
                    </div>
                  </div>
                </div>

                <button type="submit" class="btn btn-primary d-block w-100 mt-5">Start</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Tab Content -->
  </div>
</div>