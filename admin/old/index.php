<?php include 'header.php'; ?>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="#pablo">Dashboard</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">person</i>
                                </div>
                                <p class="card-category">Usuarios registrados</p>
                                <h3 class="card-title"><?php echo $numusuarios;?>

                                </h3>
                            </div>
                            <div class="card-footer" style="display:none;">
                                <div class="stats">
                                    <i class="material-icons text-danger">warning</i>
                                    <a href="#pablo">Get More Space...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-success card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">store</i>
                                </div>
                                <p class="card-category">Tiendas activas</p>
                                <h3 class="card-title"><?php echo $numtiendas;?></h3>
                            </div>
                            <div class="card-footer" style="display:none;">
                                <div class="stats">
                                    <i class="material-icons">date_range</i> Last 24 Hours
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-danger card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">local_offer</i>
                                </div>
                                <p class="card-category">Productos registrados</p>
                                <h3 class="card-title"><?php echo $numproductos;?></h3>
                            </div>
                            <div class="card-footer" style="display:none;">
                                <div class="stats">
                                    <i class="material-icons">local_offer</i> Tracked from Github
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">local_grocery_store</i>
                                </div>
                                <p class="card-category">Pedidos realizados</p>
                                <h3 class="card-title"><?php // echo $numpedidos;?> 8 </h3>
                            </div>
                            <div class="card-footer" style="display:none;">
                                <div class="stats">
                                    <i class="material-icons">local_offer</i> Tracked from Github
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header card-header-tabs card-header-primary">
                                <div class="nav-tabs-navigation">
                                    <div class="nav-tabs-wrapper">
                                        <span class="nav-tabs-title">Por revisar:</span>
                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#profile" data-toggle="tab">
                                                    <i class="material-icons">store</i> Tiendas
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#messages" data-toggle="tab">
                                                    <i class="material-icons">local_offer</i> Productos
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#settings" data-toggle="tab">
                                                    <i class="material-icons">local_grocery_store</i> Pedidos
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="profile">
                                        <table class="table">
                                            <tbody>
                                                <?php 
							$sqltiendas = "SELECT * FROM tiendas WHERE activo = 1";
							$resulttiendas = $mysqli->query($sqltiendas)  or die("Error en".$sqltiendas );
							while($rowtiendas= mysqli_fetch_array($resulttiendas)){
											$nombretienda = $rowtiendas['titulo'];
											$tipotienda = $rowtiendas['tipo'];
											$urltienda = $rowtiendas['url'];
											echo '
												<tr>
													<td>
													  <div class="form-check">
														<label class="form-check-label">
														  <input class="form-check-input" type="checkbox" value="" unchecked>
														  <span class="form-check-sign">
															<span class="check"></span>
														  </span>
														</label>
													  </div>
													</td>
													<td><a href="/cyc/tienda/'.$urltienda.'" target="_blank" rel="tooltip" title="Ver tienda">'.ucWords($nombretienda). ' ('.ucWords($tipotienda).')</a></td>
													<td class="td-actions text-right">
													  <button style="display:none;" type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
														<i class="material-icons">edit</i>
													  </button>
													  <button type="button" rel="tooltip" title="Eliminar tienda" class="btn btn-danger btn-link btn-sm">
														<i class="material-icons">close</i>
													  </button>
													</td>
												  </tr>
											';

							}
						?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="messages">
                                        <table class="table">
                                            <tbody>
                                                <?php 
							$sqlprods = "SELECT * FROM productos WHERE activo = 1";
							$resultprods = $mysqli->query($sqlprods)  or die("Error en".$sqlprods);
							while($rowprods= mysqli_fetch_array($resultprods)){
											$nombreprods = $rowprods['nombre'];
											$precio = $rowprods['precio1'];
											if($rowprods['precio2']>0){
												$precio = $rowprods['precio2'];
											}
											$urlprods = $rowprods['url'];
											echo '
												<tr>
													<td>
													  <div class="form-check">
														<label class="form-check-label">
														  <input class="form-check-input" type="checkbox" value="" unchecked>
														  <span class="form-check-sign">
															<span class="check"></span>
														  </span>
														</label>
													  </div>
													</td>
													<td><a href="/cyc/producto/'.$urlprods.'" target="_blank" rel="tooltip" title="Ver producto">'.ucWords($nombreprods). ' ($'.$precio.')</a></td>
													<td class="td-actions text-right">
													  <button style="display:none;" type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
														<i class="material-icons">edit</i>
													  </button>
													  <button type="button" rel="tooltip" title="Eliminar producto" class="btn btn-danger btn-link btn-sm">
														<i class="material-icons">close</i>
													  </button>
													</td>
												  </tr>
											';

							}
						?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="settings">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="">
                                                                <span class="form-check-sign">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Lines From Great Russian Literature? Or E-mails From My Boss?
                                                    </td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task"
                                                            class="btn btn-primary btn-link btn-sm">
                                                            <i class="material-icons">edit</i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove"
                                                            class="btn btn-danger btn-link btn-sm">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" value=""
                                                                    checked>
                                                                <span class="form-check-sign">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Flooded: One year later, assessing what was lost and what was
                                                        found when a ravaging rain swept through metro Detroit
                                                    </td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task"
                                                            class="btn btn-primary btn-link btn-sm">
                                                            <i class="material-icons">edit</i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove"
                                                            class="btn btn-danger btn-link btn-sm">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" value=""
                                                                    checked>
                                                                <span class="form-check-sign">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Sign contract for "What are conference organizers afraid of?"
                                                    </td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task"
                                                            class="btn btn-primary btn-link btn-sm">
                                                            <i class="material-icons">edit</i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove"
                                                            class="btn btn-danger btn-link btn-sm">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <?php include 'footer.php'; ?>