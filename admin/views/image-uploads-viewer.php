                            <div class="row">
                                <div id="image-gallery" class="cf">
                                <?php foreach ($images as $image): ?>
                                    <div class="image-hover">
                                        <img src="/slir/h300-w300<?= STATIC_IMG_DIR.$image["file_name"] ?>" alt="<?= $image["description"] ?>" class="gallery-items">
                                        <div class="image-btns">
                                            <div class="btn-boundry"><i class="lnr lnr-magnifier rounded-circle" data-high-res-img="<?= STATIC_IMG_DIR.$image["file_name"] ?>"></i></div>
                                            <div class="btn-boundry"><a href="imageuploads?img_id=<?= $image["id"] ?>&action=remove"><i class="lnr lnr-cross"></i></a></div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                </div>
                                <script>
                                    $(function () {
                                        var image_full_div = "<div id=\"image-full-view\"><a id=\"image-full-view-close\" onclick=\"$('#image-full-view').remove();\"><i class=\"lnr lnr-cross\"></i></a><img id=\"full-image\" /></div>";

                                        $('.lnr-magnifier').click(function () {
                                            var highsrc = $(this).data('high-res-img');
                                            $('body').prepend(image_full_div);
                                            $('#full-image').attr('src', highsrc);
                                        });
                                    });
                                </script>
                            </div>
