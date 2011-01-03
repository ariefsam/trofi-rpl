<?php
class pagination{
    public $current;
    public $total;
    public $link;
    public $prefix;
    public $jumlah_perhalaman;
    public $jumlah_page;
    function pagination($current, $total, $jumlah_perhalaman, $link, $prefix='id'){
        $this->current = $current;
        $this->total = $total;
        $this->jumlah = $jumlah;
        $this->link = $link;
        $this->prefix = $prefix;
        $this->jumlah_page = ceil($total/ $jumlah_perhalaman);
    }
    function tampilkan(){
        if ($this->jumlah_page>1){
            ?>

<div class="pagination"><ul>
        <?php
        if($this->current == 1){
            $class_previous = "prevnext disablelink";
            $linkprev = "#";
        }
        else{
            $class_previous = "prevnext";
            $linkprev = $this->link."&".$this->prefix."=".($this->current - 1);
        }
        
        if ($this->current == $this->jumlah_page) {
            $class_next = "prevnext disablelink";
            $linknext = "#";
        }

        else {
            $class_next = "prevnext";
            $linknext = $this->link."&".$this->prefix."=".($this->current + 1);
        }

        function sekarang($value1, $value2){
            if ($value1==$value2) return "currentpage"; else return "";
        }?>
        
<li><a href="<?php echo $linkprev?>" class="<?php echo $class_previous?>">« previous</a></li>
<?php
for ($i=1; $i<=$this->jumlah_page; $i++){?>
<li><a href="<?php echo $this->link . "&". $this->prefix . "=" . $i?>"<?php if(sekarang($this->current,$i)) echo "class=\"currentpage\"";?>><?php echo $i?></a></li>
<?php }?>
<li><a href="<?php echo $linknext?>" class="<?php echo $class_next ?>">next »</a></li>
</ul></div>

    <?php }}
}