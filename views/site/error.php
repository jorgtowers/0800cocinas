<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
?>
	<div class="main-inner">
		<div class="container">
			<div class="row">
				<div class="span12">
					<div class="error-container">
						<h1><?php echo $code; ?></h1>
						<div class="error-details">
							<?php echo CHtml::encode($message); ?>
						</div> <!-- /error-details -->
						<div class="error-actions">
							<a href="index.html" class="btn btn-large btn-primary">
								<i class="icon-chevron-left"></i>
								&nbsp;
								Back to Dashboard						
							</a>
						</div> <!-- /error-actions -->
					</div> <!-- /error-container -->			
				</div> <!-- /span12 -->
			</div> <!-- /row -->
		</div><!-- /container --> 
	</div><!-- /main-inner --> 
