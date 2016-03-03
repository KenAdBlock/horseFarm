<?php
/**
 * Created by PhpStorm.
 * User: jonathan
 * Date: 07/09/15
 * Time: 12:09
 */

/*foreach($users as $user) {
    echo $user->email;
}*/


?>

<h1>Liste des utilisateurs</h1>

<table class="responsive-table striped">
    <thead>
    <tr>
        <th data-field="id">Id</th>
        <th data-field="email">Email</th>
        <th data-field="password">Password</th>
        <th data-field="password">Hash</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach($users as $user): ?>
        <tr>
            <td><?= $user->id; ?></td>
            <td><?= $user->email; ?></td>
            <td><?= $user->password; ?></td>
            <td><?= $user->hash; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div class="divider"></div>




<!--
<br>
<br>
<div class="row">
    <i class="material-icons left">home</i>
    <p class="flow-text"><?/*= $model; */?></p>
</div>

<div class="row">
    <div class="col s12 m6">
        <div class="card blue-grey darken-1 hoverable">
            <div class="card-content white-text">
                <span class="card-title">Card Title</span>
                <p>I am a very simple card. I am good at containing small bits of information.
                    I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
                <a href="#">This is a link</a>
                <a href="#">This is a link</a>
            </div>
        </div>
    </div>

    <div class="col s12 m6">
        <div class="card blue-grey darken-1">
            <div class="card-content white-text">
                <span class="card-title">Card Title</span>
                <p>I am a very simple card. I am good at containing small bits of information.
                    I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
                <a href="#">This is a link</a>
                <a href="#">This is a link</a>
            </div>
        </div>
    </div>
</div>

<blockquote class="blue-text">
    This is an example quotation that uses the blockquote tag.
</blockquote>


<div class="row">
    <div class="col s1 orange darken-4">1</div>
    <div class="col s1 grid-example">2</div>
    <div class="col s1">3</div>
    <div class="col s1">4</div>
    <div class="col s1">5</div>
    <div class="col s1">6</div>
    <div class="col s1">7</div>
    <div class="col s1">8</div>
    <div class="col s1">9</div>
    <div class="col s1">10</div>
    <div class="col s1">11</div>
    <div class="col s1">12</div>
</div>

<div class="row section">
    <div class="grid-example col s12 blue lighten-2 z-depth-3"><span class="flow-text">I am always full-width (col s12)</span></div>
    <div class="grid-example col s12 m6 red lighten-2"><span class="flow-text">I am full-width on mobile (col s12 m6)</span></div>
    <div class="grid-example col s12 m6 l3 green lighten-2"><span class="flow-text">I am full-width on mobile (col s12 m6 l3)</span></div>
</div>



<p class="flow-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad aperiam asperiores atque delectus dicta eveniet ipsam labore neque nesciunt nihil non odit, officiis quaerat quam recusandae rem, repellendus sed.</p>
<p class="truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad aperiam asperiores atque delectus dicta eveniet ipsam labore neque nesciunt nihil non odit, officiis quaerat quam recusandae rem, repellendus sed.</p>
<p class="z-depth-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad aperiam asperiores atque delectus dicta eveniet ipsam labore neque nesciunt nihil non odit, officiis quaerat quam recusandae rem, repellendus sed.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad aperiam asperiores atque delectus dicta eveniet ipsam labore neque nesciunt nihil non odit, officiis quaerat quam recusandae rem, repellendus sed.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad aperiam asperiores atque delectus dicta eveniet ipsam labore neque nesciunt nihil non odit, officiis quaerat quam recusandae rem, repellendus sed.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad aperiam asperiores atque delectus dicta eveniet ipsam labore neque nesciunt nihil non odit, officiis quaerat quam recusandae rem, repellendus sed.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad aperiam asperiores atque delectus dicta eveniet ipsam labore neque nesciunt nihil non odit, officiis quaerat quam recusandae rem, repellendus sed.</p>


<div class="row">
    <div class="col s5">
        <div class="card small">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="http://materializecss.com/images/office.jpg">
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
                <p><a href="#">This is a link</a></p>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                <p>Here is some more information about this product that is only revealed once clicked on.</p>
            </div>
        </div>
    </div>
    <div class="col offset-s1 s6">
        <p class="flow-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi consectetur dicta dignissimos dolorum esse eum fugiat hic id illum ipsa itaque, laboriosam laudantium mollitia officia praesentium sed sunt ut vitae!</p>
    </div>
</div>-->