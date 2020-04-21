@section('titleOfForum')
    <div class="shops pt-4 my-md-5 pt-md-5 border-bottom">
        <div style="text-align: center">
            <h2>FORUM</h2>
            <button type="button" class="btn btn-outline-danger my-3" data-toggle="modal" data-target="#m">
                CREATE MY OWN THREAD
            </button>
            {{--{--https://s7d2.scene7.com/is/image/aeo/20180724_ae_trend_w_07?scl=1&qlt=100--}--}}
            <div class="card my-3" id="logo">
                <img src="http://www.bilisimegitim.com/icerikler/resimler/egitimler/ust/436_sosyal-medya-uzamanligi.png" width="1000px" height="200px" class="card-img-top" alt="...">
                <div class="card-body" style="text-align: center">
                    <h5 class="card-title">WHAT IS DUNE_BOARD?</h5>
                    <p class="card-text">DUNE_BOARD is a forum that has just entered the market, but is already developing confidently! Here you will find a discussion of any topic that interests you!</p>
                    <p class="card-text"><small class="text-muted">@Всё конфединциально...Тсс..</small></p>
                </div>
            </div>
        </div>
        <div class="modal fade" id="m" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Information about creating shop</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        1.1. "DUNE" or "We" means DUNE s.r.o., having its principal place of business at Na Hrebenech II 1718/10, Prague, 14000, Czech Republic, registered in the Commercial Register maintained by the Municipal Court of Prague, Section C, File 86211, ID. No.: 265 02 275.

                        1.2. "User" or "You" means the individual given the right to use a Product in accordance with this Agreement. For the avoidance of doubt, User is a natural person and not a corporation, company, partnership or association, or other entity or organization.

                        1.3. "Product Holder" means the sole proprietor or legal entity specified in the Subscription Confirmation. For legal entities, "Product Holder" includes any entity which controls, is controlled by, or is under common control with Product Holder. For the purposes of this definition, "control" means (i) the power, directly or indirectly, to direct or manage such entity, whether by contract or otherwise, or (ii) ownership of fifty percent (50%) or more of the outstanding shares or beneficial ownership of such entity.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="/createatheme"><button type="button" class="btn btn-primary">Click the link to create a store</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
