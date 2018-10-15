<?php 
require 'header.php';
 ?>
    <div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <ol class="breadcrumb slim-breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Forms</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form Validation</li>
          </ol>
          <h6 class="slim-pagetitle">Form Validation</h6>
        </div><!-- slim-pageheader -->

        <div class="section-wrapper">
          <label class="section-title">Required Input Validation</label>
          <p class="mg-b-20 mg-sm-b-40">This is a demo of a required field that must not leave empty.</p>

          <form action="form-validation.html" data-parsley-validate>
            <div class="wd-300">
              <div class="d-md-flex mg-b-30">
                <div class="form-group mg-b-0">
                  <label>Firstname: <span class="tx-danger">*</span></label>
                  <input type="text" name="firstname" class="form-control wd-250" placeholder="Enter firstname" required>
                </div><!-- form-group -->
                <div class="form-group mg-b-0 mg-md-l-20 mg-t-20 mg-md-t-0">
                  <label>Lastname: <span class="tx-danger">*</span></label>
                  <input type="text" name="lastname" class="form-control wd-250" placeholder="Enter lastname" required>
                </div><!-- form-group -->
              </div><!-- d-flex -->
              <button type="submit" class="btn btn-primary pd-x-20">Validate Form</button>
            </div>
          </form>

          <p class="section-label mg-t-40">Attribute Reference</p>
          <table class="table table-reference">
            <thead>
              <tr>
                <th class="wd-40p">Attribute</th>
                <th class="wd-60p">Description</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><code class="pd-0 bg-transparent">data-parsley-validate</code></td>
                <td>Parsley the validator looks at all data-parsley-validate occurrences in DOM on document load and automatically binds them if valid.</td>
              </tr>
              <tr>
                <td><code class="pd-0 bg-transparent">required</code></td>
                <td>Validates that a required field has been filled with a non blank value.</td>
              </tr>
            </tbody>
          </table>
        </div><!-- section-wrapper -->

        <div class="section-wrapper mg-t-20">
          <label class="section-title">Email Validation</label>
          <p class="mg-b-20 mg-sm-b-40">A demo of an email field that is required and must also be a valid email address.
It automatically validate an email when the field is in type="email".</p>

          <form action="form-validation.html" data-parsley-validate>
            <div class="d-sm-flex wd-sm-300">
              <div class="form-group mg-b-0">
                <label>Email: <span class="tx-danger">*</span></label>
                <input type="email" name="email" class="form-control wd-150 wd-xs-250" placeholder="Enter email" required>
              </div><!-- form-group -->
              <div class="mg-sm-l-10 mg-t-10 mg-sm-t-25 pd-t-4">
                <button type="submit" class="btn btn-primary pd-x-20">Validate Email</button>
              </div>
            </div>
          </form>
        </div><!-- section-wrapper -->

        <div class="section-wrapper mg-t-20">
          <label class="section-title">Checkbox/Radio Validation</label>
          <p class="mg-b-20 mg-sm-b-40">A demo of checkboxes that must be selected at least two fom any given list.</p>

          <form action="form-validation.html" data-parsley-validate>
            <p class="mg-b-10">What is your favorite browser? <span class="tx-danger">*</span></p>
            <div id="cbWrapper" class="parsley-checkbox">
              <label class="ckbox">
                <input type="checkbox" name="browser[]" value="1" data-parsley-mincheck="2" data-parsley-class-handler="#cbWrapper" data-parsley-errors-container="#cbErrorContainer" required><span>Firefox</span>
              </label>
              <label class="ckbox">
                <input type="checkbox" name="browser[]" value="2"><span>Chrome</span>
              </label>
              <label class="ckbox">
                <input type="checkbox" name="browser[]" value="3"><span>Safari</span>
              </label>
              <label class="ckbox">
                <input type="checkbox" name="browser[]" value="4"><span>Edge</span>
              </label>
            </div><!-- form-group -->
            <div id="cbErrorContainer"></div>
            <div class="mg-t-20">
              <button type="submit" class="btn btn-primary pd-x-20" value="5">Validate Form</button>
            </div>
          </form>

          <p class="section-label mg-t-40">Attribute Reference</p>
          <table class="table table-reference table-responsive">
            <thead>
              <tr>
                <th class="wd-40p">Attribute</th>
                <th class="wd-60p">Description</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><code class="pd-0 bg-transparent">data-parsley-validate</code></td>
                <td>Parsley the validator looks at all data-parsley-validate occurrences in DOM on document load and automatically binds them if valid.</td>
              </tr>
              <tr>
                <td><code class="pd-0 bg-transparent">required</code></td>
                <td>Validates that a required field has been filled with a non blank value.</td>
              </tr>
              <tr>
                <td><code class="pd-0 bg-transparent">data-parsley-mincheck="2"</code></td>
                <td>Validates that a certain minimum number of checkboxes in a group are checked.</td>
              </tr>
              <tr>
                <td><code class="pd-0 bg-transparent">data-parsley-class-handler="#cbWrapper"</code></td>
                <td>Specify the existing DOM container where ParsleyUI should add error and success classes.</td>
              </tr>
              <tr>
                <td><code class="pd-0 bg-transparent">data-parsley-errors-container="#cbErrorContainer"</code></td>
                <td>Specify the existing DOM container where ParsleyUI should put the errors.</td>
              </tr>
            </tbody>
          </table>
        </div><!-- section-wrapper -->

        <div class="section-wrapper mg-t-20">
          <label class="section-title">Select Box Validation</label>
          <p class="mg-b-20 mg-sm-b-40">A demo of select boxes that must be selected at least one fom any given option.</p>

          <form action="form-validation.html" id="selectForm">
            <div class="d-md-flex">
              <div id="slWrapper" class="parsley-select wd-250">
                <select class="form-control select2" data-placeholder="Choose one" data-parsley-class-handler="#slWrapper" data-parsley-errors-container="#slErrorContainer" required>
                  <option label="Choose one"></option>
                  <option value="Firefox">Firefox</option>
                  <option value="Chrome">Chrome</option>
                  <option value="Safari">Safari</option>
                  <option value="Opera">Opera</option>
                  <option value="Internet Explorer">Internet Explorer</option>
                </select>
                <div id="slErrorContainer"></div>
              </div>
              <div class="mg-md-l-10 mg-t-10 mg-md-t-0">
                <button type="submit" class="btn btn-primary pd-x-20" value="5">Validate Form</button>
              </div>
            </div><!-- d-flex -->
          </form>
        </div><!-- section-wrapper -->

        <div class="section-wrapper mg-t-20">
          <label class="section-title">Using Custom Layout</label>
          <p class="mg-b-20 mg-sm-b-40">A demo for using custom layout for validation.</p>

          <form action="form-validation.html" data-parsley-validate>
            <div class="form-layout form-layout-2">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="form-control-label">Firstname: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="firstname" placeholder="Enter firstname" required>
                  </div>
                </div><!-- col-4 -->
                <div class="col-md-4 mg-t--1 mg-md-t-0">
                  <div class="form-group mg-md-l--1">
                    <label class="form-control-label">Lastname: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="lastname" placeholder="Enter lastname" required>
                  </div>
                </div><!-- col-4 -->
                <div class="col-md-4 mg-t--1 mg-md-t-0">
                  <div class="form-group mg-md-l--1">
                    <label class="form-control-label">Email address: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="email" placeholder="Enter email address" required>
                  </div>
                </div><!-- col-4 -->
              </div><!-- row -->
              <div class="form-layout-footer bd pd-20 bd-t-0">
                <button class="btn btn-primary pd-x-20">Validate Form</button>
              </div><!-- form-group -->
            </div><!-- form-layout -->
          </form>
        </div><!-- section-wrapper -->

        <div class="section-wrapper mg-t-20">
          <label class="section-title">Custom Style Error Message</label>
          <p class="mg-b-20 mg-sm-b-40">A demo for using custom styled messages for error container.</p>

          <form id="selectForm2" class="parsley-style-1" action="form-validation.html">
            <div class="wd-300">
              <div class="d-md-flex mg-b-30">
                <div id="fnWrapper" class="parsley-input">
                  <label>Firstname: <span class="tx-danger">*</span></label>
                  <input type="text" name="firstname" class="form-control wd-250" placeholder="Enter firstname" data-parsley-class-handler="#fnWrapper" required>
                </div><!-- form-group -->
                <div id="lnWrapper" class="parsley-input mg-md-l-20 mg-t-20 mg-md-t-0">
                  <label>Lastname: <span class="tx-danger">*</span></label>
                  <input type="text" name="lastname" class="form-control wd-250" placeholder="Enter lastname" data-parsley-class-handler="#lnWrapper" required>
                </div><!-- form-group -->
              </div><!-- d-flex -->
            </div>
            <p class="mg-b-10">What is your favorite browser? <span class="tx-danger">*</span></p>
            <div id="cbWrapper2" class="parsley-checkbox wd-250 mg-b-0">
              <label class="ckbox">
                <input type="checkbox" name="browser[]" value="1" data-parsley-mincheck="2"
                data-parsley-class-handler="#cbWrapper2"
                data-parsley-errors-container="#cbErrorContainer2" required><span>Firefox</span>
              </label>
              <label class="ckbox">
                <input type="checkbox" name="browser[]" value="2"><span>Chrome</span>
              </label>
              <label class="ckbox">
                <input type="checkbox" name="browser[]" value="3"><span>Safari</span>
              </label>
              <label class="ckbox">
                <input type="checkbox" name="browser[]" value="4"><span>Edge</span>
              </label>
            </div><!-- parsley-checkbox -->
            <div id="cbErrorContainer2" class="wd-250"></div>

            <div id="slWrapper2" class="parsley-select wd-250 mg-t-30">
              <select class="form-control select2" data-placeholder="Choose one" data-parsley-class-handler="#slWrapper2" data-parsley-errors-container="#slErrorContainer2" required>
                <option label="Choose one"></option>
                <option value="Firefox">Firefox</option>
                <option value="Chrome">Chrome</option>
                <option value="Safari">Safari</option>
                <option value="Opera">Opera</option>
                <option value="Internet Explorer">Internet Explorer</option>
              </select>
              <div id="slErrorContainer2"></div>
            </div>

            <div class="mg-t-30">
              <button type="submit" class="btn btn-primary pd-x-20">Validate Form</button>
            </div>
          </form>
        </div><!-- section-wrapper -->


      </div><!-- container -->
    </div><!-- slim-mainpanel -->

    <div class="slim-footer">
      <div class="container">
        <p>Copyright 2018 &copy; All Rights Reserved. Slim Dashboard Template</p>
        <p>Designed by: <a href="">ThemePixels</a></p>
      </div><!-- container -->
    </div><!-- slim-footer -->

    <script src="lib/jquery/js/jquery.js"></script>
    <script src="lib/popper.js/js/popper.js"></script>
    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script src="lib/jquery.cookie/js/jquery.cookie.js"></script>
    <script src="lib/select2/js/select2.min.js"></script>
    <script src="lib/parsleyjs/js/parsley.js"></script>


    <script src="js/slim.js"></script>
    <script>
      $(function(){
        'use strict';

        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });

        $('#selectForm').parsley();
        $('#selectForm2').parsley();
      });
    </script>
  </body>
</html>
