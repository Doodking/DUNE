@section('support')
    <div class="my-3 border-bottom">
        <h3 style="text-align: center">F.A.Q.</h3>
    </div>
    <div class="alert alert-primary" role="alert">
        <h3>What if I lost access to my account?</h3>
        <p>Please describe your problem in more detail below with attached screenshots (if any). Our moderator will contact you within 3 hours and we will try to solve your problem.</p>
    </div>
    <div class="alert alert-primary" role="alert">
        <h3>This is a project of Doodking?</h3>
        <p>Yes, I'm the only one trying hard to ensure that this project saw the light, I hope you will appreciate my efforts.</p>
    </div>
    <div class="alert alert-primary" role="alert">
        <h3>What if I paid for an item but didn't receive it?</h3>
        <p>Безусловно, это одна из часто встречающихся проблем на любом маркете. Мы стараемся банить нечестных продавцов и с вероятностью 70% возвращаем деньги нашим покупателям, но для этого нам нужны доказательства, которые вы можете прислать модератору через форму ниже.</p>
    </div>
    <div class="alert alert-primary" role="alert">
        <h3>Is it safe to leave card details on the market?</h3>
        <p>In general, this is quite insecure, but thanks to our encryption, the data that is saved in Yandex. market remains only with you, and the seller, moderator, or even admin can't access it.</p>
    </div>
    <div class="alert alert-primary" role="alert">
        <h3>How to become a moderator?</h3>
        <p>This is quite difficult, because we are quite careful about our working staff, but if you have a desire, leave your contact information in the form with a note about the work, as well as write your main skills and experience.</p>
    </div>
    <div class="alert alert-primary" role="alert">
        <h3>Can DUNE be closed?</h3>
        <p>We think not! After all, the admin is located in a galaxy far, far away, and the servers are on the dark side of the moon.</p>
    </div>
    <form>
        <div class="form-group">
            <label for="exampleFormControlInput1">Theme</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="It's about blablabla....">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Choose category of question</label>
            <select class="form-control" id="exampleFormControlSelect1">
                <option>Account</option>
                <option>Work</option>
                <option>Shop tricking</option>
                <option>Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button class="btn btn-outline-warning" type="submit" style="text-align: center">SEND!</button>
    </form>
