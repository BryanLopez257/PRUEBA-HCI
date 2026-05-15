<?php /*
  Componente Blade de ejemplo: breadcrumbs
  Uso: incluirlo en layouts con un array $breadcrumbs = [['label'=>'Home','url'=>'/'], ['label'=>'Dashboard']]
*/ ?>
<?php if(!isset($breadcrumbs)) $breadcrumbs = []; ?>
<nav aria-label="breadcrumb" class="hci-breadcrumbs">
    <ol>
        <?php foreach($breadcrumbs as $i => $crumb): ?>
            <li <?php if($i === count($breadcrumbs)-1) echo 'aria-current="page"';?>>
                <?php if(isset($crumb['url']) && $i !== count($breadcrumbs)-1): ?>
                    <a href="<?= htmlspecialchars($crumb['url']) ?>"><?= htmlspecialchars($crumb['label']) ?></a>
                <?php else: ?>
                    <span><?= htmlspecialchars($crumb['label']) ?></span>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ol>
</nav>
