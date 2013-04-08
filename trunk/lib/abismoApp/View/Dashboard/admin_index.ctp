<div class="hero-unit">
  <h1>Panel de Administración</h1>
  <p>
    <ul class="nav nav-pills nav-stacked">
        <?php foreach ($navbar as $nav): ?>
            <li><?php echo $this->Html->link(__($nav['title']), $nav['url']); ?></li>
        <?php endforeach; ?>
    </ul>
  </p>
</div>
