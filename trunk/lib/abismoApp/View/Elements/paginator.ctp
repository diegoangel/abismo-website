        <?php // View element para la paginacion en frontend ?>
        <?php if ($this->Paginator->numbers()): ?>
        <div>
            <ul>
                <?php echo $this->Paginator->first(); ?>
                <?php echo $this->Paginator->prev(); ?>
                <?php echo $this->Paginator->numbers(); ?>
                <?php echo $this->Paginator->next(); ?>
                <?php echo $this->Paginator->last(); ?>
            </ul>
        </div>
        <?php endif ?>  
