<?php include 'layout-top.php' ?>

<a class='btn yellow col-12 col-md-3 mt-3' href="<?=route("projetos")?>">Novo</a>

<div class="container">
    <form method='POST' action='<?=route('projetos/salvar/'._v($data,"id"))?>'>
        <label class='col-md-6'>
            Titulo
            <input type="text" class="form-control" name="titulo" value="<?=_v($data,"nome")?>" >
        </label>
        <label class='col-md-2'>
            Descrição
            <input type="text" class="form-control" name="descricao" value="<?=_v($data,"descricao")?>" >
        </label>
        <label class='col-md-6'>
            Categoria
            <select name="categoria" class="form-control">
                <?php
                foreach($tipos as $k=>$tipo){
                    _v($data,"categoria") == $k ? $selected='selected' : $selected='';
                    print "<option value='$k' $selected>$tipo</option>";
                }
                ?>
            </select>
        </label>
        <label class='col-md-6'>
            Sub categoria
            <select name="sub_categ" class="form-control">
                <?php
                foreach($tipos as $k=>$tipo){
                    _v($data,"sub_categ") == $k ? $selected='selected' : $selected='';
                    print "<option value='$k' $selected>$tipo</option>";
                }
                ?>
            </select>
        </label>
        <button class='btn btn-primary col-12 col-md-3 mt-3'>Começar projeto</button>
    </form>
</div>



<?php include 'layout-bottom.php' ?>