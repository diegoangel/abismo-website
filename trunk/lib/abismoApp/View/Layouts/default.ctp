<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $title_for_layout; ?>
    </title>
    <?php
        echo $this->Html->meta('icon');
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>
</head>
<body>
    <div id="container">
        <div id="header">
            <h1>layout.header</h1>
        </div>
        <div id="content">

            <?php echo $this->Session->flash(); ?>

            <?php echo $this->fetch('content'); ?>
        </div>
        <div id="footer">
            layout.footer
        </div>
    </div>
</body>
</html>
