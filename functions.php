<?php
/**
 * Funções do child theme IPS Twenty Twenty-Five Child.
 *
 * @package IPS_TwentyTwentyFive_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Carrega os estilos principais do child theme no site e nos editores de blocos.
 */
function ips_twentytwentyfive_child_enqueue_styles(): void {
	wp_enqueue_style(
		'ips-twentytwentyfive-child-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'enqueue_block_assets', 'ips_twentytwentyfive_child_enqueue_styles' );

/**
 * Carrega os estilos específicos da homepage no site e no Gutenberg/Site Editor.
 * Todas as regras estão limitadas à classe .ips-home.
 */
function ips_twentytwentyfive_child_enqueue_home_assets(): void {
	$relative_path = '/assets/css/home.css';
	$absolute_path = get_stylesheet_directory() . $relative_path;
	$version       = file_exists( $absolute_path ) ? (string) filemtime( $absolute_path ) : wp_get_theme()->get( 'Version' );

	wp_enqueue_style(
		'ips-twentytwentyfive-child-home',
		get_stylesheet_directory_uri() . $relative_path,
		array( 'ips-twentytwentyfive-child-style' ),
		$version
	);
}
add_action( 'enqueue_block_assets', 'ips_twentytwentyfive_child_enqueue_home_assets', 20 );

/**
 * Carrega os estilos da página pública da app e das páginas legais.
 * As regras estão limitadas às classes .ips-app-page e .ips-legal-page,
 * permitindo que os padrões sejam editados no Gutenberg sem afetar outras páginas.
 */
function ips_twentytwentyfive_child_enqueue_leveza_app_assets(): void {
	$relative_path = '/assets/css/leveza-app.css';
	$absolute_path = get_stylesheet_directory() . $relative_path;
	$version       = file_exists( $absolute_path ) ? (string) filemtime( $absolute_path ) : wp_get_theme()->get( 'Version' );

	wp_enqueue_style(
		'ips-twentytwentyfive-child-leveza-app',
		get_stylesheet_directory_uri() . $relative_path,
		array( 'ips-twentytwentyfive-child-style' ),
		$version
	);
}
add_action( 'enqueue_block_assets', 'ips_twentytwentyfive_child_enqueue_leveza_app_assets', 30 );

/**
 * Carrega os ajustes de layout da página Leveza com Estrutura.
 * O ficheiro é carregado depois do CSS principal para funcionar como camada de refinamento.
 */
function ips_twentytwentyfive_child_enqueue_leveza_layout_assets(): void {
	$relative_path = '/assets/css/leveza-app-layout.css';
	$absolute_path = get_stylesheet_directory() . $relative_path;
	$version       = file_exists( $absolute_path ) ? (string) filemtime( $absolute_path ) : wp_get_theme()->get( 'Version' );

	wp_enqueue_style(
		'ips-twentytwentyfive-child-leveza-layout',
		get_stylesheet_directory_uri() . $relative_path,
		array( 'ips-twentytwentyfive-child-leveza-app' ),
		$version
	);
}
add_action( 'enqueue_block_assets', 'ips_twentytwentyfive_child_enqueue_leveza_layout_assets', 40 );

/**
 * Carrega os estilos da Homepage IPS v2.
 * Todas as regras estão limitadas à classe .ips-home-v2.
 */
function ips_twentytwentyfive_child_enqueue_home_v2(): void {
	$relative_path = '/assets/css/home-v2.css';
	$absolute_path = get_stylesheet_directory() . $relative_path;
	$version       = file_exists( $absolute_path ) ? (string) filemtime( $absolute_path ) : wp_get_theme()->get( 'Version' );

	wp_enqueue_style(
		'ips-home-v2',
		get_stylesheet_directory_uri() . $relative_path,
		array(),
		$version
	);
}
add_action( 'enqueue_block_assets', 'ips_twentytwentyfive_child_enqueue_home_v2', 50 );

/**
 * Carrega os estilos da página Contactos IPS.
 * Todas as regras estão limitadas à classe .ips-contact-page.
 */
function ips_twentytwentyfive_child_enqueue_contact_page(): void {
	$relative_path = '/assets/css/contactos-v1.css';
	$absolute_path = get_stylesheet_directory() . $relative_path;
	$version       = file_exists( $absolute_path ) ? (string) filemtime( $absolute_path ) : wp_get_theme()->get( 'Version' );

	wp_enqueue_style(
		'ips-contact-page',
		get_stylesheet_directory_uri() . $relative_path,
		array(),
		$version
	);
}
add_action( 'enqueue_block_assets', 'ips_twentytwentyfive_child_enqueue_contact_page', 60 );

/**
 * Processa uma submissão do formulário de contactos.
 *
 * O resultado fica apenas em memória durante o pedido atual. Nenhum dado é
 * guardado na base de dados.
 *
 * @return array{status:string,values:array{name:string,email:string,phone:string,subject:string,message:string,consent:bool}}
 */
function ips_twentytwentyfive_child_process_contact_form(): array {
	static $submission = null;

	if ( null !== $submission ) {
		return $submission;
	}

	$empty_values = array(
		'name'    => '',
		'email'   => '',
		'phone'   => '',
		'subject' => '',
		'message' => '',
		'consent' => false,
	);

	$submission = array(
		'status' => '',
		'values' => $empty_values,
	);

	if ( 'POST' !== ( $_SERVER['REQUEST_METHOD'] ?? '' ) ) {
		return $submission;
	}

	$get_field = static function ( string $key ): string {
		if ( ! isset( $_POST[ $key ] ) || ! is_string( $_POST[ $key ] ) ) {
			return '';
		}

		return wp_unslash( $_POST[ $key ] );
	};

	if ( 'submit' !== sanitize_text_field( $get_field( 'ips_contact_form_action' ) ) ) {
		return $submission;
	}

	$submission['values'] = array(
		'name'    => sanitize_text_field( $get_field( 'ips_contact_name' ) ),
		'email'   => sanitize_email( $get_field( 'ips_contact_email' ) ),
		'phone'   => sanitize_text_field( $get_field( 'ips_contact_phone' ) ),
		'subject' => sanitize_text_field( $get_field( 'ips_contact_subject' ) ),
		'message' => sanitize_textarea_field( $get_field( 'ips_contact_message' ) ),
		'consent' => '1' === sanitize_text_field( $get_field( 'ips_contact_consent' ) ),
	);

	$nonce     = sanitize_text_field( $get_field( 'ips_contact_form_nonce' ) );
	$honeypot  = sanitize_text_field( $get_field( 'ips_contact_website' ) );
	$is_valid  = wp_verify_nonce( $nonce, 'ips_contact_form_submit' );
	$is_valid  = $is_valid && '' !== $submission['values']['name'];
	$is_valid  = $is_valid && is_email( $submission['values']['email'] );
	$is_valid  = $is_valid && '' !== $submission['values']['subject'];
	$is_valid  = $is_valid && '' !== $submission['values']['message'];
	$is_valid  = $is_valid && $submission['values']['consent'];

	if ( '' !== $honeypot ) {
		$submission['status'] = 'success';
		$submission['values'] = $empty_values;
		return $submission;
	}

	if ( ! $is_valid ) {
		$submission['status'] = 'error';
		return $submission;
	}

	$origin_url = get_permalink();
	$origin_url = $origin_url ? esc_url_raw( $origin_url ) : home_url( '/' );

	$mail_subject = sprintf(
		'Novo contacto através do website — %s',
		str_replace( array( "\r", "\n" ), '', $submission['values']['subject'] )
	);

	$mail_body = implode(
		"\n",
		array(
			'Nome: ' . $submission['values']['name'],
			'Email: ' . $submission['values']['email'],
			'Telefone: ' . ( $submission['values']['phone'] ?: 'Não indicado' ),
			'Assunto: ' . $submission['values']['subject'],
			'',
			'Mensagem:',
			$submission['values']['message'],
			'',
			'Data e hora: ' . wp_date( 'd/m/Y H:i:s' ),
			'URL de origem: ' . $origin_url,
		)
	);

	$sent = wp_mail(
		'geral@inespinhosantos.pt',
		$mail_subject,
		$mail_body,
		array(
			'Content-Type: text/plain; charset=UTF-8',
			'Reply-To: ' . $submission['values']['email'],
		)
	);

	$submission['status'] = $sent ? 'success' : 'error';

	if ( $sent ) {
		$submission['values'] = $empty_values;
	}

	return $submission;
}

/**
 * Renderiza o formulário nativo da página de contactos.
 *
 * @return string
 */
function ips_twentytwentyfive_child_render_contact_form(): string {
	$submission = ips_twentytwentyfive_child_process_contact_form();
	$values     = $submission['values'];
	$form_id    = wp_unique_id( 'ips-contact-form-' );

	ob_start();
	?>
	<?php if ( 'success' === $submission['status'] ) : ?>
		<div class="ips-contact-page__form-notice ips-contact-page__form-notice--success" role="status">
			<?php echo esc_html__( 'Obrigado pelo teu contacto. A tua mensagem foi recebida e será respondida logo que possível.', 'ips-twentytwentyfive-child' ); ?>
		</div>
	<?php elseif ( 'error' === $submission['status'] ) : ?>
		<div class="ips-contact-page__form-notice ips-contact-page__form-notice--error" role="alert">
			<?php echo esc_html__( 'Não foi possível enviar a mensagem. Tenta novamente ou contacta-nos por email ou WhatsApp.', 'ips-twentytwentyfive-child' ); ?>
		</div>
	<?php endif; ?>

	<form class="ips-contact-page__form" method="post" action="">
		<div class="ips-contact-page__form-fields">
			<div class="ips-contact-page__form-field">
				<label class="ips-contact-page__form-label" for="<?php echo esc_attr( $form_id . '-name' ); ?>">
					<?php echo esc_html__( 'Nome', 'ips-twentytwentyfive-child' ); ?> <span class="ips-contact-page__form-required" aria-hidden="true">*</span>
				</label>
				<input id="<?php echo esc_attr( $form_id . '-name' ); ?>" name="ips_contact_name" type="text" value="<?php echo esc_attr( $values['name'] ); ?>" autocomplete="name" maxlength="120" required aria-required="true">
			</div>

			<div class="ips-contact-page__form-field">
				<label class="ips-contact-page__form-label" for="<?php echo esc_attr( $form_id . '-email' ); ?>">
					<?php echo esc_html__( 'Email', 'ips-twentytwentyfive-child' ); ?> <span class="ips-contact-page__form-required" aria-hidden="true">*</span>
				</label>
				<input id="<?php echo esc_attr( $form_id . '-email' ); ?>" name="ips_contact_email" type="email" value="<?php echo esc_attr( $values['email'] ); ?>" autocomplete="email" maxlength="254" required aria-required="true">
			</div>

			<div class="ips-contact-page__form-field">
				<label class="ips-contact-page__form-label" for="<?php echo esc_attr( $form_id . '-phone' ); ?>">
					<?php echo esc_html__( 'Telefone (opcional)', 'ips-twentytwentyfive-child' ); ?>
				</label>
				<input id="<?php echo esc_attr( $form_id . '-phone' ); ?>" name="ips_contact_phone" type="tel" value="<?php echo esc_attr( $values['phone'] ); ?>" autocomplete="tel" maxlength="50">
			</div>

			<div class="ips-contact-page__form-field">
				<label class="ips-contact-page__form-label" for="<?php echo esc_attr( $form_id . '-subject' ); ?>">
					<?php echo esc_html__( 'Assunto', 'ips-twentytwentyfive-child' ); ?> <span class="ips-contact-page__form-required" aria-hidden="true">*</span>
				</label>
				<input id="<?php echo esc_attr( $form_id . '-subject' ); ?>" name="ips_contact_subject" type="text" value="<?php echo esc_attr( $values['subject'] ); ?>" maxlength="200" required aria-required="true">
			</div>

			<div class="ips-contact-page__form-field ips-contact-page__form-field--wide">
				<label class="ips-contact-page__form-label" for="<?php echo esc_attr( $form_id . '-message' ); ?>">
					<?php echo esc_html__( 'Mensagem', 'ips-twentytwentyfive-child' ); ?> <span class="ips-contact-page__form-required" aria-hidden="true">*</span>
				</label>
				<textarea id="<?php echo esc_attr( $form_id . '-message' ); ?>" name="ips_contact_message" maxlength="5000" required aria-required="true"><?php echo esc_textarea( $values['message'] ); ?></textarea>
			</div>
		</div>

		<div class="ips-contact-page__form-consent">
			<input id="<?php echo esc_attr( $form_id . '-consent' ); ?>" name="ips_contact_consent" type="checkbox" value="1" required aria-required="true" <?php checked( $values['consent'] ); ?>>
			<label for="<?php echo esc_attr( $form_id . '-consent' ); ?>">
				<?php
				printf(
					wp_kses(
						/* translators: %s: link to the privacy policy. */
						__( 'Li e aceito a %s e autorizo o tratamento dos meus dados para resposta ao contacto enviado.', 'ips-twentytwentyfive-child' ),
						array( 'a' => array( 'href' => array() ) )
					),
					'<a href="' . esc_url( 'https://inespinhosantos.pt/politica-de-privacidade/' ) . '">' . esc_html__( 'Política de Privacidade', 'ips-twentytwentyfive-child' ) . '</a>'
				);
				?>
			</label>
		</div>

		<div class="ips-contact-page__website-field" aria-hidden="true">
			<label for="<?php echo esc_attr( $form_id . '-website' ); ?>">Website</label>
			<input id="<?php echo esc_attr( $form_id . '-website' ); ?>" name="ips_contact_website" type="text" value="" tabindex="-1" autocomplete="off">
		</div>

		<?php wp_nonce_field( 'ips_contact_form_submit', 'ips_contact_form_nonce' ); ?>
		<input type="hidden" name="ips_contact_form_action" value="submit">
		<button class="ips-contact-page__form-submit" type="submit">
			<?php echo esc_html__( 'Enviar mensagem', 'ips-twentytwentyfive-child' ); ?>
		</button>
	</form>
	<?php

	return (string) ob_get_clean();
}
add_shortcode( 'ips_contact_form', 'ips_twentytwentyfive_child_render_contact_form' );
