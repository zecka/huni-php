<?php get_header(); ?>
<?php if(user_is_log()){echo 'connecté';}else{echo "non connecté";}  ?>
<h1>ERREUR 404!</h1>
<p>La page que vous essayez d'accéder ne peut pas être trouvée.</p>
<a href="<?php echo get_home_url(); ?>">Retour à la page d'accueil</a>
<?php get_footer(); ?>