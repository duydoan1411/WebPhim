
<?php
    require_once __DIR__."/../Controller/ControllerPhim.php";

    if (!isset($_SESSION['email'])){
        header("Location: " . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://") . $_SERVER['HTTP_HOST'] . "/login.php");
        exit();
    }  else{
        $controllerUser = new ControllerUser();
        $user = $controllerUser->getUserFromEmail($_SESSION['email']);
        if (strcmp($user->getISADMIN(), "1") != 0) {
            header("Location: " . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://") . $_SERVER['HTTP_HOST'] . "/login.php");
            exit();
        }
    }

    $controllerPhim = new ControllerPhim();
?>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Danh sách</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li class="pull-right">
                        <a class="collapse-link DS"
                        ><i class="fa fa-chevron-up"></i
                            ></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content DS">
                <div class="table-responsive">
                    <table
                            class="table table-striped jambo_table bulk_action"
                            id="table">
                        <thead>
                        <tr class="headings">
                            <th class="column-title">ID</th>
                            <th class="column-title">Tên</th>
                            <th class="column-title">Trạng Thái</th>
                            <th class="column-title">Thời Lượng</th>
                            <th class="column-title">Trailer</th>
                            <th class="column-title">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $phim = $controllerPhim->getAllPhim();
                        foreach ($phim as $item){
                            echo "<tr class=\"even pointer\">
                            <td class=\"\">".$item->getID()."</td>
                            <td style='max-width: 10%'>
                                ".$item->getTENPHIMVN()."
                            </td>
                            <td>".$item->getTRANGTHAI()."</td>
                            <td>".$item->getTHOILUONG()."</td>
                            <td>".$item->getTRAILER()."</td>
                            <td class=\"last\">
                                <div class=\"zvn-box-btn-filter\">
                                    <a
                                            href=\"index.php?page=moviemod&editPhim=true&idphim=".$item->getID()."\"
                                            type=\"button\"
                                            class=\"btn btn-icon btn-success\"
                                            data-toggle=\"tooltip\"
                                            data-placement=\"top\"
                                            data-original-title=\"Edit\">
                                        <i class=\"fa fa-pencil\"></i> </a>
                                        <a
                                            href=\"/delete/1\"
                                            type=\"button\"
                                            class=\"btn btn-icon btn-danger btn-delete\"
                                            data-toggle=\"tooltip\"
                                            data-placement=\"top\"
                                            data-original-title=\"Delete\">
                                        <i class=\"fa fa-trash\"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>";
                        }

                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>