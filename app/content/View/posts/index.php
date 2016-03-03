<?php
/**
 * Created by PhpStorm.
 * User: jonathan
 * Date: 07/09/15
 * Time: 12:09
 */
?>
<h1 class="blue-text">Actualités</h1>

<div class="row">
{% for post in posts %}
    <div class="col s12 section">
        <p class="blue-text right"> {{ post.author }}</p>
        <h4>{{ post.title }}</h4>
        <p class="truncate">
            {{ post.Intro }}
        </p>
        <a href="{{ post.Url }}">Voir l'article</a>
        <div class="divider"></div>
    </div>
{% endfor %}
</div>