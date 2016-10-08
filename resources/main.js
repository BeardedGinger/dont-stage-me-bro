jQuery(document).ready(function($){

	var noticeBox        = '#lc-stage-notice',
			noticeBoxContent = $(noticeBox).find('p'),
			stageMe          = LC_STAGE_ME.currentState,
			stageNotice      = LC_STAGE_ME.stage,
			dontStageNotice  = LC_STAGE_ME.dontStage,
			trigger          = '#lc-stage-status-trigger';

	$(noticeBox).addClass('notice');

	if ( 'dont-stage-me' != stageMe ) {
		$(noticeBox).addClass('notice-success');
		$(noticeBoxContent).text( stageNotice );
	} else {
		$(noticeBox).addClass('notice-success');
		$(noticeBoxContent).text( dontStageNotice );
	}

	$(trigger).click( function() {

		$(this).prepend('<span class="spinner is_active" style="visibility:visible;display:inline-block"></span>');

		if ( $(noticeBox).hasClass('notice-success') ) {

			var value = 'dont-stage-me';

			$(noticeBox).removeClass('notice-success');
			$(noticeBox).addClass('notice-error');
			$(noticeBoxContent).text( dontStageNotice );

		} else {

			var value = 'stage-me';

			$(noticeBox).removeClass('notice-error');
			$(noticeBox).addClass('notice-success');
			$(noticeBoxContent).text( stageNotice );

		}

		var data = {
			'action': 'save_staging_status',
			'nonce': LC_STAGE_ME.nonce,
			'value': value,
		};

		$.post(ajaxurl, data, function(response) {
			$('.spinner').remove();
		});

	});


});
