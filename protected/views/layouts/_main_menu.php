<?php 
					
		$userType = Yii::app()->user->getState('description'); 

		if ($userType == 'enduser') :?>

			<div id="mainmenu">
				<?php $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>'Home', 'url'=>array('/site/index')),
						array('label'=>'Purchase Order', 'url'=>Yii::app()->createUrl('purchase_order/create')),
						array('label'=>'Approved List', 'url'=>array('/purchase_order?t=a')),	
						array('label'=>'Rejected List', 'url'=>array('/purchase_order?t=r')),	
						array('label'=>'Pending List', 'url'=>array('/purchase_order?t=p')),
						array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
					),
				)); ?>
			</div><!-- mainmenu -->

		<?php elseif($userType == 'accountant') :?>

			<div id="mainmenu">
				<?php $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>'Home', 'url'=>array('/site/index')),
						array('label'=>'For Approval', 'url'=>array('/purchase_order?t=act')),
						array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
					),
				)); ?>
			</div><!-- mainmenu -->
		
		<?php elseif($userType == 'pastor') :?>

			<div id="mainmenu">
				<?php $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>'Home', 'url'=>array('/site/index')),
						array('label'=>'For Approval', 'url'=>array('/purchase_order?t=ptr')),
						array('label'=>'Useraccount', 'url'=>array('/useraccount/admin')),
						array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
					),
				)); ?>
			</div><!-- mainmenu -->

		<?php elseif($userType == 'superuser') :?>

			<div id="mainmenu">
				<?php $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>'Home', 'url'=>array('/site/index')),
						array('label'=>'Approved List', 'url'=>array('/purchase_order?t=ptr')),
						array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
					),
				)); ?>
			</div><!-- mainmenu -->
		
		<?php else:?>

		<div id="mainmenu">
				<?php $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>'Home', 'url'=>array('/site/index')),

					),
				)); ?>
			</div><!-- mainmenu -->
		<?php endif;?>