<?php
$args = array(
    'object_subtype' => 'filmes',
    'type' => 'string',
    'single' => true,
    'show_in_rest' => true
);
register_meta('post', 'diretor', $args);

add_action( 'add_meta_boxes', 'myplugin_add_custom_box' );

// Compatibilidade para  WP < 3.0
// add_action( 'admin_init', 'myplugin_add_custom_box', 1 );

/* Faça algo com os dados inseridos */
add_action( 'save_post', 'myplugin_save_postdata' );

/* Adiciona uma meta box na coluna principal das telas de edição de Post e Página */
function myplugin_add_custom_box() {
    $screens = array( 'filmes' );
    foreach ($screens as $screen) {
        add_meta_box(
            '',
            __( 'Ficha técnica', 'post-types' ),
            'myplugin_inner_custom_box',
            $screen
        );
    }
}

/* Imprime o conteúdo da meta box */
function myplugin_inner_custom_box( $post ) {

    // Os campos para inserção dos dados
    // Use get_post_meta para para recuperar um valor existente no banco de dados e usá-lo dentro do atributo HTML 'value'
    $value = get_post_meta( $post->ID, 'diretor', true );
    echo '<label for="myplugin_new_field">';
    _e("Diretor", 'post-types' );
    echo '</label> ';
    echo '<input type="text" id="myplugin_new_field" name="myplugin_new_field" value="'.esc_attr($value).'" size="25" />';
}

/* Quando o post for salvo, salvamos também nossos dados personalizados */
function myplugin_save_postdata( $post_id ) {

    // É necessário verificar se o usuário está autorizado a fazer isso
    if ( 'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) )
            return;
    } else {
        if ( ! current_user_can( 'edit_post', $post_id ) )
            return;
    }

    // Por fim, salvamos o valor no banco

    // Recebe o ID do post
    $post_ID = $_POST['post_ID'];

    // Remove caracteres indesejados
    $mydata = sanitize_text_field( $_POST['myplugin_new_field'] );

    // Adicionamos ou atualizados o $mydata
    update_post_meta($post_ID, 'diretor', $mydata);
}