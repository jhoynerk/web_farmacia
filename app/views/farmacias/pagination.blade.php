
{{HTML::style('css/farmacias/pagination.css')}}

<div class="pagination">
	<ul>
		<?php if ($paginator->getCurrentPage() <= 1): ?>
		<li class="disabled "><span class="arrow-left"><img src="<?php echo URL::to('/'); ?>/img/home/flecha_izq.png" alt="flecha izquierda"></span></li>
		
		<?php else: ?>
		<li ><a class="arrow arrow-left" href="<?= $paginator->getUrl($paginator->getCurrentPage() - 1) ?>"><img src="<?php echo URL::to('/'); ?>/img/home/flecha_izq.png" alt="flecha izquierda"></a></li>
		
		<?php endif; ?>

		<?php for ($page = 1; $page <= $paginator->getLastPage(); $page++): ?>

		<?php if ($paginator->getCurrentPage() == $page): ?>
		<li class="active number"><span><?= $page ?></span></li>

		<?php else: ?>
		<li class="number"><a href="<?= $paginator->getUrl($page) ?>"><?= $page ?></a></li>
		
		<?php endif; ?>
		<?php endfor; ?>

		<?php if ($paginator->getCurrentPage() >= $paginator->getLastPage()): ?>
		<li class="disabled"><span class="arrow-right"><img src="<?php echo URL::to('/'); ?>/img/home/flecha_derecha.png" alt="flecha derecha"></span></li>
		
		<?php else: ?>
		<li><a class="arrow arrow-right" href="<?= $paginator->getUrl($paginator->getCurrentPage() + 1) ?>"><img src="<?php echo URL::to('/'); ?>/img/home/flecha_derecha.png" alt="flecha derecha"></a></li>
		
		<?php endif; ?>	
		
	</ul>
</div>