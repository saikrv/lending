		<div class="clearFix"></div>
		<div class="contentBody">
			<div class="contentTitle">View Loan</div>
			<div class="clearFix"></div>
			<div class="leftcontentBody">
				<?php $this->menu->generate(); ?>
	        </div>
	        <div class="rightcontentBody">
	        	<table class="loan" cellspacing="1">
	        		<thead>
	        			<tr>
	        				<th>Loan #</th>
	        				<th>Borrower</th>
	        				<th>Loan Type</th>
	        				<th>Status</th>
	        			</tr>
	        		</thead>
	        		<tbody>
	        			<?php 
							$loans = $this->Loan_model->get_borrower_loans();
						?>
						<?php if ($loans) : ?>
	        			<?php foreach ($loans->result() as $loan) :?>
	        			<tr>
	        				<td><a href="<?php echo base_url(); ?>loan/view_info/?id=<?php echo $loan->borrower_loan_id;?>"><?php echo $loan->borrower_loan_id; ?></a></td>
	        				<td><a href="<?php echo base_url(); ?>borrower/view/?id=<?php echo $loan->borrower_id;?>"><?php echo $loan->lname.', '.$loan->fname; ?></a></td>
	        				<td><?php echo $loan->loan_name; ?></td>
	        				<td><span style="color:<?php echo $loan->status=='ACTIVE' ? 'GREEN' : 'RED'?>"><?php echo $loan->status; ?></span></td>
	        			</tr>
	        			<?php endforeach; ?>
	        			<?php endif; ?>
	        		</tbody>
	        	</table>
	        	<!-- pager -->
				<div class='loan_pager'>
				    <img src='<?php echo base_url(); ?>css/tablesorter/first.png' class='first'/>
				    <img src='<?php echo base_url(); ?>css/tablesorter/prev.png' class='prev'/>
				    <span class='pagedisplay'></span> <!-- this can be any element, including an input -->
				    <img src='<?php echo base_url(); ?>css/tablesorter/next.png' class='next'/>
				    <img src='<?php echo base_url(); ?>css/tablesorter/last.png' class='last'/>
				    <select class='pagesize'>
				        <option value='20'>20</option>
				        <option value='30'>30</option>
				        <option value='40'>40</option>
				    </select>
				</div>
	        </div>
	        <div class="clearFix"></div>
		</div>
		<script type='text/javascript'>
			$('.loan').tablesorter()
				.tablesorterPager({
				    container: $('.loan_pager'),
				    updateArrows: true,
				    page: 0,
				    size: 20,
				    fixedHeight: false,
				    removeRows: false,
				    cssNext: '.next',
				    cssPrev: '.prev',
				    cssFirst: '.first',
				    cssLast: '.last',
				    cssPageDisplay: '.pagedisplay',
				    cssPageSize: '.pagesize',
				    cssDisabled: 'disabled'
			});
		</script>
		