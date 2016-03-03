<div class="row section">
    <?php $form = new \Plugins\MaterializeForms\MaterializeForms('User'); ?>
    <?= $form->start([
        "title"  => "Se connecter",
        "method" => "post",
        "action" => "users.login",
    ]); ?>

    <div class="row">
        <?= $form->input("email", [
            "type"  => "email",
            "icon"  => "mail",
            "label" => "Email",
            "class" => "validate",
        ]); ?>

        <?= $form->input("password", [
            "type"  => "password",
            "icon"  => "vpn_key",
            "label" => "Password",
            "class" => "validate",
        ]); ?>
    </div>

    <?= $form->submit("Se connecter", [
        "class" => "col offset-s7 s5 offset-m7 m3 offset-l6 l3",
        "icon"  => "send",
    ]) ?>

    <?= $form->end(); ?>
</div>