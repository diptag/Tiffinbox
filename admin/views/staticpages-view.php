					<div class="row">
						<div class="col-md-12">
							<div class="panel">
								<div class="panel-heading">
									<div class="row">
										<h2>Static Pages</h2>
										<div class="right"><a href="add-static-page" class="btn btn-success"><i class="fa fa-plus"></i> &nbsp;&nbsp;<span>Add New Static Page</span></a></div>
									</div>
								</div>
								<div class="panel-body no-padding">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>S. No.</th>
												<th>Page</th>
												<th>Date Created</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
                                        <?php
                                            $i = 1;
                                            foreach ($staticpages as $staticpage):
                                        ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= $staticpage["name"] ?></td>
                                                <td><?= $staticpage["dateAdded"] ?></td>
                                                <td>
                                                    <a href="edit-static-page?sp_id=<?= $staticpage["id"] ?>&action=edit">
                                                        <i class="fa fa-pencil" style="color:blue ;"></i>
                                                    </a>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <a href="edit-static-page?sp_id=<?= $staticpage["id"] ?>&action=remove">
                                                        <i class="fa fa-remove" style="color:red ;"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
                    </div>
