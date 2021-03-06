<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('header');?>
  </head>
  <body>
    <div id="wrapper">
      <?php $this->load->view('menu'); ?>
      <nav class="navbar navbar-inverse" id="forms-subnav">
        <ul class="nav navbar-nav navbar-left navbar-user">
          <li class="<?php echo (isset($submenu['active']) && $submenu['active'] == 'quality')? 'active' : '' ?>"><a href="/settlements/index">All</a></li>
          <li class="<?php echo (isset($submenu['active']) && $submenu['active'] == 'quality')? 'active' : '' ?>"><a href="/settlements/index_app">Approved</a></li>
          <li class="<?php echo (isset($submenu['active']) && $submenu['active'] == 'quality')? 'active' : '' ?>"><a href="/settlements/index_wat">Waiting Approval</a></li>
          <li class="<?php echo (isset($submenu['active']) && $submenu['active'] == 'quality')? 'active' : '' ?>"><a href="/settlements/index_rej">Rejected</a></li>
        </ul>
      </nav>
        <div id="page-wrapper">
          <a href="<?php echo base_url(); ?>settlements/submit/" class="btn btn-info">New settlements</a>
        <a href="<?php echo base_url(); ?>quality/" class="btn btn-danger" style="float: right;">Go Back To Quality Forms</a>
          <br>
          <br>
          <div class="rest-selector col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <fieldset>
              <?php $this->load->view('settlements_waiting_menu'); ?>
            </fieldset>
          </div>
          <?php if (isset($state)): ?> 
            <?php if ($state == 0) {   ?>
          <div class="pager tablesorter-pager" style="display: block;">
            Page: <select class="form-control gotoPage pager-filter" aria-disabled="false"></select>
            <i class="fa fa-fast-backward pager-nav first disabled" alt="First" title="First page" tabindex="0" aria-disabled="true"></i>
            <i class="fa fa-backward pager-nav prev disabled" alt="Prev" title="Previous page" tabindex="0" aria-disabled="true"></i>
            <span class="pagedisplay"></span>
            <i class="fa fa-forward pager-nav next" alt="Next" title="Next page" tabindex="0" aria-disabled="false"></i>
            <i class="fa fa-fast-forward pager-nav last" alt="Last" title="Last page" tabindex="0" aria-disabled="false"></i>
            <select class="form-control pagesize pager-filter" aria-disabled="false">
              <option selected="selected" value="10">10</option>
              <option value="30">30</option>
              <option value="50">50</option>
            </select>
          </div>
        <table class="table table-bordered table-hover table-striped tablesorter">
          <thead>
            <tr>
              <th class="header">#<i class="fa fa-sort"></i></th>
              <th class="header">Hotel<i class="fa fa-sort"></i></th>
              <th class="header">SAF, £<i class="fa fa-sort"></i></th>
              <th class="header">Date of SAF<i class="fa fa-sort"></i></th>
              <th class="header">Status of Claim<i class="fa fa-sort"></i></th>
              <th class="header">Customer Name<i class="fa fa-sort"></i></th>
              <th class="header">Reference N.<i class="fa fa-sort"></i></th>
              <th class="header">Date of Incident<i class="fa fa-sort"></i></th>
              <th class="header">Nature of Claim<i class="fa fa-sort"></i></th>
              <th class="header">Highest Reserve, £<i class="fa fa-sort"></i></th>
              <th class="header">Closed Notice Amount, £<i class="fa fa-sort"></i></th>
              <th class="header">Status of SAF<i class="fa fa-sort"></i></th>
              <th class="header">Final settlements reached between SUNRISE and TO, £<i class="fa fa-sort"></i></th>
              <th class="header">Date of Final settlements reached between SUNRISE and TO<i class="fa fa-sort"></i></th>
              <th class="header">Action<i class="fa fa-sort"></i></th>
              <th class="header">Authorized by<i class="fa fa-sort"></i></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($settlements as $forma ){?>
              <?php if ($forma['state_id'] !='0' && $forma['state_id'] !='2' && $forma['state_id'] !='3'){?>
            <tr class="active">
              <td><?php echo $forma['id'] ?></td>
              <td><?php echo $forma['hotel_name'] ?></td>
              <td><?php echo $forma['Proposed']." ".$forma['currency'] ?></td>
              <td><?php echo $forma['Date'] ?></td>
              <td><?php echo $forma['claim_status'] ?></td>
              <td><?php echo $forma['File'] ?></td>
              <td><?php echo $forma['Ref'] ?></td>
              <td><?php echo $forma['date_incident'] ?></td>
              <td><?php echo $forma['nature_claim'] ?></td>
              <td><?php echo $forma['Highest_Reserve']." ". $forma['reserve_currency'] ?></td>
              <td><?php echo $forma['closed_amount'] ?></td>
              <td><?php echo $forma['status'] ?></td>
              <td><?php echo $forma['final_settlement'] ?></td>
              <td><?php echo $forma['final_settlement_date'] ?></td>
              <td><a href="<?php echo base_url(); ?>settlements/view/<?php echo $forma['id'] ?> " class="btn btn-primary">View</a></td>
              <td>
                <?php foreach ($forma['approvals'] as $approval): ?>
                <?php if (isset($approval['sign'])): ?>
                <div class="signer<?php echo isset($approval['sign']['reject'])? ' rejected' : ' accepted' ?>">
                <?php echo $approval['sign']['name'] ?></div>
                <?php elseif(isset($approval['queue'])): ?>
                <div class="signer unsigned"><?php echo $approval['role'] ?></div>
                <?php endif ?>
                <?php endforeach ?>
              </td>
              <?php } ?>
            </tr>
              <?php } ?>
          <tbody>
      </table>  
           
        <div class="pager tablesorter-pager" style="display: block;">
          Page: <select class="form-control gotoPage pager-filter" aria-disabled="false"></select>
          <i class="fa fa-fast-backward pager-nav first disabled" alt="First" title="First page" tabindex="0" aria-disabled="true"></i>
          <i class="fa fa-backward pager-nav prev disabled" alt="Prev" title="Previous page" tabindex="0" aria-disabled="true"></i>
          <span class="pagedisplay"></span>
          <i class="fa fa-forward pager-nav next" alt="Next" title="Next page" tabindex="0" aria-disabled="false"></i>
          <i class="fa fa-fast-forward pager-nav last" alt="Last" title="Last page" tabindex="0" aria-disabled="false"></i>
          <select class="form-control pagesize pager-filter" aria-disabled="false">
            <option selected="selected" value="10">10</option>
            <option value="30">30</option>
            <option value="50">50</option>
          </select>
        </div>
      <?php }elseif ($state == 1) {   ?>
        <div class="pager tablesorter-pager" style="display: block;">
            Page: <select class="form-control gotoPage pager-filter" aria-disabled="false"></select>
            <i class="fa fa-fast-backward pager-nav first disabled" alt="First" title="First page" tabindex="0" aria-disabled="true"></i>
            <i class="fa fa-backward pager-nav prev disabled" alt="Prev" title="Previous page" tabindex="0" aria-disabled="true"></i>
            <span class="pagedisplay"></span>
            <i class="fa fa-forward pager-nav next" alt="Next" title="Next page" tabindex="0" aria-disabled="false"></i>
            <i class="fa fa-fast-forward pager-nav last" alt="Last" title="Last page" tabindex="0" aria-disabled="false"></i>
            <select class="form-control pagesize pager-filter" aria-disabled="false">
              <option selected="selected" value="10">10</option>
              <option value="30">30</option>
              <option value="50">50</option>
            </select>
          </div>
        <table class="table table-bordered table-hover table-striped tablesorter">
          <thead>
            <tr>
              <th class="header">#<i class="fa fa-sort"></i></th>
              <th class="header">Hotel<i class="fa fa-sort"></i></th>
              <th class="header">SAF, £<i class="fa fa-sort"></i></th>
              <th class="header">Date of SAF<i class="fa fa-sort"></i></th>
              <th class="header">Status of Claim<i class="fa fa-sort"></i></th>
              <th class="header">Customer Name<i class="fa fa-sort"></i></th>
              <th class="header">Reference N.<i class="fa fa-sort"></i></th>
              <th class="header">Date of Incident<i class="fa fa-sort"></i></th>
              <th class="header">Nature of Claim<i class="fa fa-sort"></i></th>
              <th class="header">Highest Reserve, £<i class="fa fa-sort"></i></th>
              <th class="header">Closed Notice Amount, £<i class="fa fa-sort"></i></th>
              <th class="header">Status of SAF<i class="fa fa-sort"></i></th>
              <th class="header">Final settlements reached between SUNRISE and TO, £<i class="fa fa-sort"></i></th>
              <th class="header">Date of Final settlements reached between SUNRISE and TO<i class="fa fa-sort"></i></th>
              <th class="header">Action<i class="fa fa-sort"></i></th>
              <th class="header">Authorized by<i class="fa fa-sort"></i></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($settlements as $forma ){?>
              <?php if ($forma['state_id'] =='1' ){?>
            <tr class="active">
              <td><?php echo $forma['id'] ?></td>
              <td><?php echo $forma['hotel_name'] ?></td>
              <td><?php echo $forma['Proposed']." ".$forma['currency'] ?></td>
              <td><?php echo $forma['Date'] ?></td>
              <td><?php echo $forma['claim_status'] ?></td>
              <td><?php echo $forma['File'] ?></td>
              <td><?php echo $forma['Ref'] ?></td>
              <td><?php echo $forma['date_incident'] ?></td>
              <td><?php echo $forma['nature_claim'] ?></td>
              <td><?php echo $forma['Highest_Reserve']." ". $forma['reserve_currency'] ?></td>
              <td><?php echo $forma['closed_amount'] ?></td>
              <td><?php echo $forma['status'] ?></td>
              <td><?php echo $forma['final_settlement'] ?></td>
              <td><?php echo $forma['final_settlement_date'] ?></td>
              <td><a href="<?php echo base_url(); ?>settlements/view/<?php echo $forma['id'] ?> " class="btn btn-primary">View</a></td>
              <td>
                <?php foreach ($forma['approvals'] as $approval): ?>
                <?php if (isset($approval['sign'])): ?>
                <div class="signer<?php echo isset($approval['sign']['reject'])? ' rejected' : ' accepted' ?>">
                <?php echo $approval['sign']['name'] ?></div>
                <?php elseif(isset($approval['queue'])): ?>
                <div class="signer unsigned"><?php echo $approval['role'] ?></div>
                <?php endif ?>
                <?php endforeach ?>
              </td>
              <?php } ?>
            </tr>
              <?php } ?>
          <tbody>
        </table>
        <div class="pager tablesorter-pager" style="display: block;">
          Page: <select class="form-control gotoPage pager-filter" aria-disabled="false"></select>
          <i class="fa fa-fast-backward pager-nav first disabled" alt="First" title="First page" tabindex="0" aria-disabled="true"></i>
          <i class="fa fa-backward pager-nav prev disabled" alt="Prev" title="Previous page" tabindex="0" aria-disabled="true"></i>
          <span class="pagedisplay"></span>
          <i class="fa fa-forward pager-nav next" alt="Next" title="Next page" tabindex="0" aria-disabled="false"></i>
          <i class="fa fa-fast-forward pager-nav last" alt="Last" title="Last page" tabindex="0" aria-disabled="false"></i>
          <select class="form-control pagesize pager-filter" aria-disabled="false">
            <option selected="selected" value="10">10</option>
            <option value="30">30</option>
            <option value="50">50</option>
          </select>
        </div>
      <?php }elseif ($state == 2) {   ?>
        <div class="pager tablesorter-pager" style="display: block;">
            Page: <select class="form-control gotoPage pager-filter" aria-disabled="false"></select>
            <i class="fa fa-fast-backward pager-nav first disabled" alt="First" title="First page" tabindex="0" aria-disabled="true"></i>
            <i class="fa fa-backward pager-nav prev disabled" alt="Prev" title="Previous page" tabindex="0" aria-disabled="true"></i>
            <span class="pagedisplay"></span>
            <i class="fa fa-forward pager-nav next" alt="Next" title="Next page" tabindex="0" aria-disabled="false"></i>
            <i class="fa fa-fast-forward pager-nav last" alt="Last" title="Last page" tabindex="0" aria-disabled="false"></i>
            <select class="form-control pagesize pager-filter" aria-disabled="false">
              <option selected="selected" value="10">10</option>
              <option value="30">30</option>
              <option value="50">50</option>
            </select>
          </div>
        <table class="table table-bordered table-hover table-striped tablesorter">
          <thead>
            <tr>
            <th class="header">#<i class="fa fa-sort"></i></th>
              <th class="header">Hotel<i class="fa fa-sort"></i></th>
              <th class="header">SAF, £<i class="fa fa-sort"></i></th>
              <th class="header">Date of SAF<i class="fa fa-sort"></i></th>
              <th class="header">Status of Claim<i class="fa fa-sort"></i></th>
              <th class="header">Customer Name<i class="fa fa-sort"></i></th>
              <th class="header">Reference N.<i class="fa fa-sort"></i></th>
              <th class="header">Date of Incident<i class="fa fa-sort"></i></th>
              <th class="header">Nature of Claim<i class="fa fa-sort"></i></th>
              <th class="header">Highest Reserve, £<i class="fa fa-sort"></i></th>
              <th class="header">Closed Notice Amount, £<i class="fa fa-sort"></i></th>
              <th class="header">Status of SAF<i class="fa fa-sort"></i></th>
              <th class="header">Final settlements reached between SUNRISE and TO, £<i class="fa fa-sort"></i></th>
              <th class="header">Date of Final settlements reached between SUNRISE and TO<i class="fa fa-sort"></i></th>
              <th class="header">Action<i class="fa fa-sort"></i></th>
              <th class="header">Authorized by<i class="fa fa-sort"></i></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($settlements as $forma ){?>
              <?php if ($forma['state_id'] =='9'){?>
            <tr class="active">
              <td><?php echo $forma['id'] ?></td>
              <td><?php echo $forma['hotel_name'] ?></td>
              <td><?php echo $forma['Proposed']." ".$forma['currency'] ?></td>
              <td><?php echo $forma['Date'] ?></td>
              <td><?php echo $forma['claim_status'] ?></td>
              <td><?php echo $forma['File'] ?></td>
              <td><?php echo $forma['Ref'] ?></td>
              <td><?php echo $forma['date_incident'] ?></td>
              <td><?php echo $forma['nature_claim'] ?></td>
              <td><?php echo $forma['Highest_Reserve']." ". $forma['reserve_currency'] ?></td>
              <td><?php echo $forma['closed_amount'] ?></td>
              <td><?php echo $forma['status'] ?></td>
              <td><?php echo $forma['final_settlement'] ?></td>
              <td><?php echo $forma['final_settlement_date'] ?></td>
              <td><a href="<?php echo base_url(); ?>settlements/view/<?php echo $forma['id'] ?> " class="btn btn-primary">View</a></td>
              <td>
                <?php foreach ($forma['approvals'] as $approval): ?>
                <?php if (isset($approval['sign'])): ?>
                <div class="signer<?php echo isset($approval['sign']['reject'])? ' rejected' : ' accepted' ?>">
                <?php echo $approval['sign']['name'] ?></div>
                <?php elseif(isset($approval['queue'])): ?>
                <div class="signer unsigned"><?php echo $approval['role'] ?></div>
                <?php endif ?>
                <?php endforeach ?>
              </td>
              <?php } ?>
            </tr>
              <?php } ?>
          <tbody>
        </table>
        <div class="pager tablesorter-pager" style="display: block;">
          Page: <select class="form-control gotoPage pager-filter" aria-disabled="false"></select>
          <i class="fa fa-fast-backward pager-nav first disabled" alt="First" title="First page" tabindex="0" aria-disabled="true"></i>
          <i class="fa fa-backward pager-nav prev disabled" alt="Prev" title="Previous page" tabindex="0" aria-disabled="true"></i>
          <span class="pagedisplay"></span>
          <i class="fa fa-forward pager-nav next" alt="Next" title="Next page" tabindex="0" aria-disabled="false"></i>
          <i class="fa fa-fast-forward pager-nav last" alt="Last" title="Last page" tabindex="0" aria-disabled="false"></i>
          <select class="form-control pagesize pager-filter" aria-disabled="false">
            <option selected="selected" value="10">10</option>
            <option value="30">30</option>
            <option value="50">50</option>
          </select>
        </div>
      <?php }elseif ($state == 3) {   ?>
        <div class="pager tablesorter-pager" style="display: block;">
            Page: <select class="form-control gotoPage pager-filter" aria-disabled="false"></select>
            <i class="fa fa-fast-backward pager-nav first disabled" alt="First" title="First page" tabindex="0" aria-disabled="true"></i>
            <i class="fa fa-backward pager-nav prev disabled" alt="Prev" title="Previous page" tabindex="0" aria-disabled="true"></i>
            <span class="pagedisplay"></span>
            <i class="fa fa-forward pager-nav next" alt="Next" title="Next page" tabindex="0" aria-disabled="false"></i>
            <i class="fa fa-fast-forward pager-nav last" alt="Last" title="Last page" tabindex="0" aria-disabled="false"></i>
            <select class="form-control pagesize pager-filter" aria-disabled="false">
              <option selected="selected" value="10">10</option>
              <option value="30">30</option>
              <option value="50">50</option>
            </select>
          </div>
        <table class="table table-bordered table-hover table-striped tablesorter">
          <thead>
            <tr>
              <th class="header">#<i class="fa fa-sort"></i></th>
              <th class="header">Hotel<i class="fa fa-sort"></i></th>
              <th class="header">SAF, £<i class="fa fa-sort"></i></th>
              <th class="header">Date of SAF<i class="fa fa-sort"></i></th>
              <th class="header">Status of Claim<i class="fa fa-sort"></i></th>
              <th class="header">Customer Name<i class="fa fa-sort"></i></th>
              <th class="header">Reference N.<i class="fa fa-sort"></i></th>
              <th class="header">Date of Incident<i class="fa fa-sort"></i></th>
              <th class="header">Nature of Claim<i class="fa fa-sort"></i></th>
              <th class="header">Highest Reserve, £<i class="fa fa-sort"></i></th>
              <th class="header">Closed Notice Amount, £<i class="fa fa-sort"></i></th>
              <th class="header">Status of SAF<i class="fa fa-sort"></i></th>
              <th class="header">Final settlements reached between SUNRISE and TO, £<i class="fa fa-sort"></i></th>
              <th class="header">Date of Final settlements reached between SUNRISE and TO<i class="fa fa-sort"></i></th>
              <th class="header">Action<i class="fa fa-sort"></i></th>
              <th class="header">Authorized by<i class="fa fa-sort"></i></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($settlements as $forma ){?>
              <?php if ($forma['state_id'] =='5'){?>
            <tr class="active">
              <td><?php echo $forma['id'] ?></td>
              <td><?php echo $forma['hotel_name'] ?></td>
              <td><?php echo $forma['Proposed']." ".$forma['currency'] ?></td>
              <td><?php echo $forma['Date'] ?></td>
              <td><?php echo $forma['claim_status'] ?></td>
              <td><?php echo $forma['File'] ?></td>
              <td><?php echo $forma['Ref'] ?></td>
              <td><?php echo $forma['date_incident'] ?></td>
              <td><?php echo $forma['nature_claim'] ?></td>
              <td><?php echo $forma['Highest_Reserve']." ". $forma['reserve_currency'] ?></td>
              <td><?php echo $forma['closed_amount'] ?></td>
              <td><?php echo $forma['status'] ?></td>
              <td><?php echo $forma['final_settlement'] ?></td>
              <td><?php echo $forma['final_settlement_date'] ?></td>
              <td><a href="<?php echo base_url(); ?>settlements/view/<?php echo $forma['id'] ?> " class="btn btn-primary">View</a></td>
              <td>
                <?php foreach ($forma['approvals'] as $approval): ?>
                <?php if (isset($approval['sign'])): ?>
                <div class="signer<?php echo isset($approval['sign']['reject'])? ' rejected' : ' accepted' ?>">
                <?php echo $approval['sign']['name'] ?></div>
                <?php elseif(isset($approval['queue'])): ?>
                <div class="signer unsigned"><?php echo $approval['role'] ?></div>
                <?php endif ?>
                <?php endforeach ?>
              </td>
              <?php } ?>
            </tr>
              <?php } ?>
          <tbody>      
       </table>  
        
        <div class="pager tablesorter-pager" style="display: block;">
          Page: <select class="form-control gotoPage pager-filter" aria-disabled="false"></select>
          <i class="fa fa-fast-backward pager-nav first disabled" alt="First" title="First page" tabindex="0" aria-disabled="true"></i>
          <i class="fa fa-backward pager-nav prev disabled" alt="Prev" title="Previous page" tabindex="0" aria-disabled="true"></i>
          <span class="pagedisplay"></span>
          <i class="fa fa-forward pager-nav next" alt="Next" title="Next page" tabindex="0" aria-disabled="false"></i>
          <i class="fa fa-fast-forward pager-nav last" alt="Last" title="Last page" tabindex="0" aria-disabled="false"></i>
          <select class="form-control pagesize pager-filter" aria-disabled="false">
            <option selected="selected" value="10">10</option>
            <option value="30">30</option>
            <option value="50">50</option>
          </select>
        </div>
        <?php }elseif ($state == 4) {   ?>
        <div class="pager tablesorter-pager" style="display: block;">
            Page: <select class="form-control gotoPage pager-filter" aria-disabled="false"></select>
            <i class="fa fa-fast-backward pager-nav first disabled" alt="First" title="First page" tabindex="0" aria-disabled="true"></i>
            <i class="fa fa-backward pager-nav prev disabled" alt="Prev" title="Previous page" tabindex="0" aria-disabled="true"></i>
            <span class="pagedisplay"></span>
            <i class="fa fa-forward pager-nav next" alt="Next" title="Next page" tabindex="0" aria-disabled="false"></i>
            <i class="fa fa-fast-forward pager-nav last" alt="Last" title="Last page" tabindex="0" aria-disabled="false"></i>
            <select class="form-control pagesize pager-filter" aria-disabled="false">
              <option selected="selected" value="10">10</option>
              <option value="30">30</option>
              <option value="50">50</option>
            </select>
          </div>
        <table class="table table-bordered table-hover table-striped tablesorter">
          <thead>
            <tr>
             <th class="header">#<i class="fa fa-sort"></i></th>
              <th class="header">Hotel<i class="fa fa-sort"></i></th>
              <th class="header">SAF, £<i class="fa fa-sort"></i></th>
              <th class="header">Date of SAF<i class="fa fa-sort"></i></th>
              <th class="header">Status of Claim<i class="fa fa-sort"></i></th>
              <th class="header">Customer Name<i class="fa fa-sort"></i></th>
              <th class="header">Reference N.<i class="fa fa-sort"></i></th>
              <th class="header">Date of Incident<i class="fa fa-sort"></i></th>
              <th class="header">Nature of Claim<i class="fa fa-sort"></i></th>
              <th class="header">Highest Reserve, £<i class="fa fa-sort"></i></th>
              <th class="header">Closed Notice Amount, £<i class="fa fa-sort"></i></th>
              <th class="header">Status of SAF<i class="fa fa-sort"></i></th>
              <th class="header">Final settlements reached between SUNRISE and TO, £<i class="fa fa-sort"></i></th>
              <th class="header">Date of Final settlements reached between SUNRISE and TO<i class="fa fa-sort"></i></th>
              <th class="header">Action<i class="fa fa-sort"></i></th>
              <th class="header">Authorized by<i class="fa fa-sort"></i></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($settlements as $forma ){?>
              <?php if ($forma['state_id'] =='6'){?>
               <tr class="active">
              <td><?php echo $forma['id'] ?></td>
              <td><?php echo $forma['hotel_name'] ?></td>
              <td><?php echo $forma['Proposed']." ".$forma['currency'] ?></td>
              <td><?php echo $forma['Date'] ?></td>
              <td><?php echo $forma['claim_status'] ?></td>
              <td><?php echo $forma['File'] ?></td>
              <td><?php echo $forma['Ref'] ?></td>
              <td><?php echo $forma['date_incident'] ?></td>
              <td><?php echo $forma['nature_claim'] ?></td>
              <td><?php echo $forma['Highest_Reserve']." ". $forma['reserve_currency'] ?></td>
              <td><?php echo $forma['closed_amount'] ?></td>
              <td><?php echo $forma['status'] ?></td>
              <td><?php echo $forma['final_settlement'] ?></td>
              <td><?php echo $forma['final_settlement_date'] ?></td>
              <td><a href="<?php echo base_url(); ?>settlements/view/<?php echo $forma['id'] ?> " class="btn btn-primary">View</a></td>
              <td>
                <?php foreach ($forma['approvals'] as $approval): ?>
                <?php if (isset($approval['sign'])): ?>
                <div class="signer<?php echo isset($approval['sign']['reject'])? ' rejected' : ' accepted' ?>">
                <?php echo $approval['sign']['name'] ?></div>
                <?php elseif(isset($approval['queue'])): ?>
                <div class="signer unsigned"><?php echo $approval['role'] ?></div>
                <?php endif ?>
                <?php endforeach ?>
              </td>
              <?php } ?>
            </tr>
              <?php } ?>
          <tbody>
       </table>  
 
        <div class="pager tablesorter-pager" style="display: block;">
          Page: <select class="form-control gotoPage pager-filter" aria-disabled="false"></select>
          <i class="fa fa-fast-backward pager-nav first disabled" alt="First" title="First page" tabindex="0" aria-disabled="true"></i>
          <i class="fa fa-backward pager-nav prev disabled" alt="Prev" title="Previous page" tabindex="0" aria-disabled="true"></i>
          <span class="pagedisplay"></span>
          <i class="fa fa-forward pager-nav next" alt="Next" title="Next page" tabindex="0" aria-disabled="false"></i>
          <i class="fa fa-fast-forward pager-nav last" alt="Last" title="Last page" tabindex="0" aria-disabled="false"></i>
          <select class="form-control pagesize pager-filter" aria-disabled="false">
            <option selected="selected" value="10">10</option>
            <option value="30">30</option>
            <option value="50">50</option>
          </select>
        </div>
        <?php }elseif ($state == 5) {   ?>
        <div class="pager tablesorter-pager" style="display: block;">
            Page: <select class="form-control gotoPage pager-filter" aria-disabled="false"></select>
            <i class="fa fa-fast-backward pager-nav first disabled" alt="First" title="First page" tabindex="0" aria-disabled="true"></i>
            <i class="fa fa-backward pager-nav prev disabled" alt="Prev" title="Previous page" tabindex="0" aria-disabled="true"></i>
            <span class="pagedisplay"></span>
            <i class="fa fa-forward pager-nav next" alt="Next" title="Next page" tabindex="0" aria-disabled="false"></i>
            <i class="fa fa-fast-forward pager-nav last" alt="Last" title="Last page" tabindex="0" aria-disabled="false"></i>
            <select class="form-control pagesize pager-filter" aria-disabled="false">
              <option selected="selected" value="10">10</option>
              <option value="30">30</option>
              <option value="50">50</option>
            </select>
          </div>
        <table class="table table-bordered table-hover table-striped tablesorter">
          <thead>
            <tr>
             <th class="header">#<i class="fa fa-sort"></i></th>
              <th class="header">Hotel<i class="fa fa-sort"></i></th>
              <th class="header">SAF, £<i class="fa fa-sort"></i></th>
              <th class="header">Date of SAF<i class="fa fa-sort"></i></th>
              <th class="header">Status of Claim<i class="fa fa-sort"></i></th>
              <th class="header">Customer Name<i class="fa fa-sort"></i></th>
              <th class="header">Reference N.<i class="fa fa-sort"></i></th>
              <th class="header">Date of Incident<i class="fa fa-sort"></i></th>
              <th class="header">Nature of Claim<i class="fa fa-sort"></i></th>
              <th class="header">Highest Reserve, £<i class="fa fa-sort"></i></th>
              <th class="header">Closed Notice Amount, £<i class="fa fa-sort"></i></th>
              <th class="header">Status of SAF<i class="fa fa-sort"></i></th>
              <th class="header">Final settlements reached between SUNRISE and TO, £<i class="fa fa-sort"></i></th>
              <th class="header">Date of Final settlements reached between SUNRISE and TO<i class="fa fa-sort"></i></th>
              <th class="header">Action<i class="fa fa-sort"></i></th>
              <th class="header">Authorized by<i class="fa fa-sort"></i></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($settlements as $forma ){?>
              <?php if ($forma['state_id'] =='7'){?>
          <tr class="active">
              <td><?php echo $forma['id'] ?></td>
              <td><?php echo $forma['hotel_name'] ?></td>
              <td><?php echo $forma['Proposed']." ".$forma['currency'] ?></td>
              <td><?php echo $forma['Date'] ?></td>
              <td><?php echo $forma['claim_status'] ?></td>
              <td><?php echo $forma['File'] ?></td>
              <td><?php echo $forma['Ref'] ?></td>
              <td><?php echo $forma['date_incident'] ?></td>
              <td><?php echo $forma['nature_claim'] ?></td>
              <td><?php echo $forma['Highest_Reserve']." ". $forma['reserve_currency'] ?></td>
              <td><?php echo $forma['closed_amount'] ?></td>
              <td><?php echo $forma['status'] ?></td>
              <td><?php echo $forma['final_settlement'] ?></td>
              <td><?php echo $forma['final_settlement_date'] ?></td>
              <td><a href="<?php echo base_url(); ?>settlements/view/<?php echo $forma['id'] ?> " class="btn btn-primary">View</a></td>
              <td>
                <?php foreach ($forma['approvals'] as $approval): ?>
                <?php if (isset($approval['sign'])): ?>
                <div class="signer<?php echo isset($approval['sign']['reject'])? ' rejected' : ' accepted' ?>">
                <?php echo $approval['sign']['name'] ?></div>
                <?php elseif(isset($approval['queue'])): ?>
                <div class="signer unsigned"><?php echo $approval['role'] ?></div>
                <?php endif ?>
                <?php endforeach ?>
              </td>
              <?php } ?>
            </tr>
              <?php } ?>
          <tbody>
     </table>  
        <div class="pager tablesorter-pager" style="display: block;">
          Page: <select class="form-control gotoPage pager-filter" aria-disabled="false"></select>
          <i class="fa fa-fast-backward pager-nav first disabled" alt="First" title="First page" tabindex="0" aria-disabled="true"></i>
          <i class="fa f-a-backward pager-nav prev disabled" alt="Prev" title="Previous page" tabindex="0" aria-disabled="true"></i>
          <span class="pagedisplay"></span>
          <i class="fa fa-forward pager-nav next" alt="Next" title="Next page" tabindex="0" aria-disabled="false"></i>
          <i class="fa fa-fast-forward pager-nav last" alt="Last" title="Last page" tabindex="0" aria-disabled="false"></i>
          <select class="form-control pagesize pager-filter" aria-disabled="false">
            <option selected="selected" value="10">10</option>
            <option value="30">30</option>
            <option value="50">50</option>
          </select>
        </div>
        <?php }elseif ($state == 6) {   ?>
        <div class="pager tablesorter-pager" style="display: block;">
            Page: <select class="form-control gotoPage pager-filter" aria-disabled="false"></select>
            <i class="fa fa-fast-backward pager-nav first disabled" alt="First" title="First page" tabindex="0" aria-disabled="true"></i>
            <i class="fa fa-backward pager-nav prev disabled" alt="Prev" title="Previous page" tabindex="0" aria-disabled="true"></i>
            <span class="pagedisplay"></span>
            <i class="fa fa-forward pager-nav next" alt="Next" title="Next page" tabindex="0" aria-disabled="false"></i>
            <i class="fa fa-fast-forward pager-nav last" alt="Last" title="Last page" tabindex="0" aria-disabled="false"></i>
            <select class="form-control pagesize pager-filter" aria-disabled="false">
              <option selected="selected" value="10">10</option>
              <option value="30">30</option>
              <option value="50">50</option>
            </select>
          </div>
        <table class="table table-bordered table-hover table-striped tablesorter">
          <thead>
            <tr>
              <th class="header">#<i class="fa fa-sort"></i></th>
              <th class="header">Hotel<i class="fa fa-sort"></i></th>
              <th class="header">SAF, £<i class="fa fa-sort"></i></th>
              <th class="header">Date of SAF<i class="fa fa-sort"></i></th>
              <th class="header">Status of Claim<i class="fa fa-sort"></i></th>
              <th class="header">Customer Name<i class="fa fa-sort"></i></th>
              <th class="header">Reference N.<i class="fa fa-sort"></i></th>
              <th class="header">Date of Incident<i class="fa fa-sort"></i></th>
              <th class="header">Nature of Claim<i class="fa fa-sort"></i></th>
              <th class="header">Highest Reserve, £<i class="fa fa-sort"></i></th>
              <th class="header">Closed Notice Amount, £<i class="fa fa-sort"></i></th>
              <th class="header">Status of SAF<i class="fa fa-sort"></i></th>
              <th class="header">Final settlements reached between SUNRISE and TO, £<i class="fa fa-sort"></i></th>
              <th class="header">Date of Final settlements reached between SUNRISE and TO<i class="fa fa-sort"></i></th>
              <th class="header">Action<i class="fa fa-sort"></i></th>
              <th class="header">Authorized by<i class="fa fa-sort"></i></th>
            </tr>
          </thead>
          <tbody>
        
            <?php foreach($settlements as $forma ){?>
              <?php if ($forma['state_id'] =='8'){?>
             <tr class="active">
              <td><?php echo $forma['id'] ?></td>
              <td><?php echo $forma['hotel_name'] ?></td>
              <td><?php echo $forma['Proposed']." ".$forma['currency'] ?></td>
              <td><?php echo $forma['Date'] ?></td>
              <td><?php echo $forma['claim_status'] ?></td>
              <td><?php echo $forma['File'] ?></td>
              <td><?php echo $forma['Ref'] ?></td>
              <td><?php echo $forma['date_incident'] ?></td>
              <td><?php echo $forma['nature_claim'] ?></td>
              <td><?php echo $forma['Highest_Reserve']." ". $forma['reserve_currency'] ?></td>
              <td><?php echo $forma['closed_amount'] ?></td>
              <td><?php echo $forma['status'] ?></td>
              <td><?php echo $forma['final_settlement'] ?></td>
              <td><?php echo $forma['final_settlement_date'] ?></td>
              <td><a href="<?php echo base_url(); ?>settlements/view/<?php echo $forma['id'] ?> " class="btn btn-primary">View</a></td>
              <td>
                <?php foreach ($forma['approvals'] as $approval): ?>
                <?php if (isset($approval['sign'])): ?>
                <div class="signer<?php echo isset($approval['sign']['reject'])? ' rejected' : ' accepted' ?>">
                <?php echo $approval['sign']['name'] ?></div>
                <?php elseif(isset($approval['queue'])): ?>
                <div class="signer unsigned"><?php echo $approval['role'] ?></div>
                <?php endif ?>
                <?php endforeach ?>
              </td>
              <?php } ?>
            </tr>
              <?php } ?>
        </table>
        <div class="pager tablesorter-pager" style="display: block;">
          Page: <select class="form-control gotoPage pager-filter" aria-disabled="false"></select>
          <i class="fa fa-fast-backward pager-nav first disabled" alt="First" title="First page" tabindex="0" aria-disabled="true"></i>
          <i class="fa fa-backward pager-nav prev disabled" alt="Prev" title="Previous page" tabindex="0" aria-disabled="true"></i>
          <span class="pagedisplay"></span>
          <i class="fa fa-forward pager-nav next" alt="Next" title="Next page" tabindex="0" aria-disabled="false"></i>
          <i class="fa fa-fast-forward pager-nav last" alt="Last" title="Last page" tabindex="0" aria-disabled="false"></i>
          <select class="form-control pagesize pager-filter" aria-disabled="false">
            <option selected="selected" value="10">10</option>
            <option value="30">30</option>
            <option value="50">50</option>
          </select>
        </div>
        <?php }elseif ($state == 7) {   ?>
        <div class="pager tablesorter-pager" style="display: block;">
            Page: <select class="form-control gotoPage pager-filter" aria-disabled="false"></select>
            <i class="fa fa-fast-backward pager-nav first disabled" alt="First" title="First page" tabindex="0" aria-disabled="true"></i>
            <i class="fa fa-backward pager-nav prev disabled" alt="Prev" title="Previous page" tabindex="0" aria-disabled="true"></i>
            <span class="pagedisplay"></span>
            <i class="fa fa-forward pager-nav next" alt="Next" title="Next page" tabindex="0" aria-disabled="false"></i>
            <i class="fa fa-fast-forward pager-nav last" alt="Last" title="Last page" tabindex="0" aria-disabled="false"></i>
            <select class="form-control pagesize pager-filter" aria-disabled="false">
              <option selected="selected" value="10">10</option>
              <option value="30">30</option>
              <option value="50">50</option>
            </select>
          </div>
        <table class="table table-bordered table-hover table-striped tablesorter">
          <thead>
            <tr>
              <th class="header">#<i class="fa fa-sort"></i></th>
              <th class="header">Hotel<i class="fa fa-sort"></i></th>
              <th class="header">SAF, £<i class="fa fa-sort"></i></th>
              <th class="header">Date of SAF<i class="fa fa-sort"></i></th>
              <th class="header">Status of Claim<i class="fa fa-sort"></i></th>
              <th class="header">Customer Name<i class="fa fa-sort"></i></th>
              <th class="header">Reference N.<i class="fa fa-sort"></i></th>
              <th class="header">Date of Incident<i class="fa fa-sort"></i></th>
              <th class="header">Nature of Claim<i class="fa fa-sort"></i></th>
              <th class="header">Highest Reserve, £<i class="fa fa-sort"></i></th>
              <th class="header">Closed Notice Amount, £<i class="fa fa-sort"></i></th>
              <th class="header">Status of SAF<i class="fa fa-sort"></i></th>
              <th class="header">Final settlements reached between SUNRISE and TO, £<i class="fa fa-sort"></i></th>
              <th class="header">Date of Final settlements reached between SUNRISE and TO<i class="fa fa-sort"></i></th>
              <th class="header">Action<i class="fa fa-sort"></i></th>
              <th class="header">Authorized by<i class="fa fa-sort"></i></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($settlements as $forma ){?>
              <?php if ($forma['state_id'] =='4'){?>
           <tr class="active">
              <td><?php echo $forma['id'] ?></td>
              <td><?php echo $forma['hotel_name'] ?></td>
              <td><?php echo $forma['Proposed']." ".$forma['currency'] ?></td>
              <td><?php echo $forma['Date'] ?></td>
              <td><?php echo $forma['claim_status'] ?></td>
              <td><?php echo $forma['File'] ?></td>
              <td><?php echo $forma['Ref'] ?></td>
              <td><?php echo $forma['date_incident'] ?></td>
              <td><?php echo $forma['nature_claim'] ?></td>
              <td><?php echo $forma['Highest_Reserve']." ". $forma['reserve_currency'] ?></td>
              <td><?php echo $forma['closed_amount'] ?></td>
              <td><?php echo $forma['status'] ?></td>
              <td><?php echo $forma['final_settlements'] ?></td>
              <td><?php echo $forma['final_settlements_date'] ?></td>
              <td><a href="<?php echo base_url(); ?>settlements/view/<?php echo $forma['id'] ?> " class="btn btn-primary">View</a></td>
              <td>
                <?php foreach ($forma['approvals'] as $approval): ?>
                <?php if (isset($approval['sign'])): ?>
                <div class="signer<?php echo isset($approval['sign']['reject'])? ' rejected' : ' accepted' ?>">
                <?php echo $approval['sign']['name'] ?></div>
                <?php elseif(isset($approval['queue'])): ?>
                <div class="signer unsigned"><?php echo $approval['role'] ?></div>
                <?php endif ?>
                <?php endforeach ?>
              </td>
              <?php } ?>
            </tr>
              <?php } ?>
        </table>
        <div class="pager tablesorter-pager" style="display: block;">
          Page: <select class="form-control gotoPage pager-filter" aria-disabled="false"></select>
          <i class="fa fa-fast-backward pager-nav first disabled" alt="First" title="First page" tabindex="0" aria-disabled="true"></i>
          <i class="fa fa-backward pager-nav prev disabled" alt="Prev" title="Previous page" tabindex="0" aria-disabled="true"></i>
          <span class="pagedisplay"></span>
          <i class="fa fa-forward pager-nav next" alt="Next" title="Next page" tabindex="0" aria-disabled="false"></i>
          <i class="fa fa-fast-forward pager-nav last" alt="Last" title="Last page" tabindex="0" aria-disabled="false"></i>
          <select class="form-control pagesize pager-filter" aria-disabled="false">
            <option selected="selected" value="10">10</option>
            <option value="30">30</option>
            <option value="50">50</option>
          </select>
        </div>
        <?php } ?>
      <?php endif; ?>
      </div>
    </div>
    <script type="text/javascript">
      $(function(){
        // define pager options
        var pagerOptions = {
          // target the pager markup - see the HTML block below
          container: $(".pager"),
          // output string - default is '{page}/{totalPages}'; possible variables: {page}, {totalPages}, {startRow}, {endRow} and {totalRows}
          output: '{startRow} - {endRow} / {filteredRows} ({totalRows})',
          // if true, the table will remain the same height no matter how many records are displayed. The space is made up by an empty
          // table row set to a height to compensate; default is false
          fixedHeight: true,
          // remove rows from the table to speed up the sort of large tables.
          // setting this to false, only hides the non-visible rows; needed if you plan to add/remove rows with the pager enabled.
          removeRows: false,
          // go to page selector - select dropdown that sets the current page
          cssGoto: '.gotoPage'
        };
        // Initialize tablesorter
        // ***********************
        $("table")
        .tablesorter({
          theme: 'bootstrap',
          headerTemplate : '{content} {icon}', // new in v2.7. Needed to add the bootstrap icon!
          widthFixed: true,
          widgets: ['filter'],
          widgetOptions: {
            filter_reset : '.reset-filters',
            filter_functions: {
              1: {
                <?php foreach ($hotels as $hotel) :?>
                "<?php echo $hotel['name']; ?>":function(e, n, f, i, $r) { return f == e; },
                <?php endforeach; ?>
               },
            }
          }
        })
        // initialize the pager plugin
        // ****************************
        .tablesorterPager(pagerOptions)
        .find(".tablesorter-filter-row td:last input").replaceWith('<a href="<?php echo base_url(); ?>settlements/" class="reset-filters btn btn-warning">Reset</a>');
      });
    </script>
  </body>
</html>
