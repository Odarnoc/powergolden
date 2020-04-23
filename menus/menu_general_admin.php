<?php
    $query = 'SELECT * FROM menus';
    $listaMenuShow = R::getAll($query);

    $menuShow = array();

    foreach ($listaMenuShow as $item) {
        $menuTemp = array();
        $query = 'SELECT sm.label,sm.ruta FROM privilegios as p LEFT JOIN submenu as sm ON p.menu_id = sm.id WHERE sm.menu_id = '.$item['id'].' AND p.rol_id = '.$_SESSION["rol"];
        $subMenus = R::getAll($query);
        if(sizeof($subMenus)>0){
            $res['nombre'] = $item['label'];
            $res['subs'] = $subMenus;
            array_push($menuShow, $res);
        }
    }


?>
<div class="col-lg-4 col-md-4 bg-white" style="margin-top: 6rem">
                    <div class="d-menu-left">

                        <div class="d-list-menu">
                            <ul>
                            <?php
                                foreach ($menuShow as $item) {
                                    if(sizeof($item['subs'])==1){
                            ?>
                                        <li><a href="<?php echo $item['subs'][0]['ruta']; ?>"><?php echo $item['subs'][0]['label']; ?></a></li>
                            <?php           
                                    }else {
                            ?>
                                        <li>
                                            <div class="dropdown show">
                                                <a class="dropdown-toggle" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <?php echo $item['nombre']; ?>
                                                    </a>
                                                    
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <?php foreach ($item['subs'] as $item2) { ?>
                                                        <a class="dropdown-item" href="<?php echo $item2['ruta']; ?>"><?php echo $item2['label']; ?></a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </li>
                            <?php
                                    }
                                }
                            ?>
                                
                                <li><a class="logout" href="ajax/cerrar_sesion.php">Cerrar sesión<i class="fas fa-sign-out-alt"></i></a></li>
                            </ul>

                        </div>

                    </div>

                </div>
                
