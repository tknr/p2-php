/* vim: set fileencoding=cp932 ai noet ts=4 sw=4 sts=4: */
/* mi: charset=Shift_JIS */

/**
 * ��\����Ԃ̃T���l�C����ǂݍ���
 * 
 * �ǂݍ��ݔ���ɂ͒u���ΏۃI�u�W�F�N�g�̗L���𗘗p�B
 * �Ԃ�l�͉摜���ǂݍ��ݍς݂��ۂ��B
 */
function loadThumb(thumb_url, thumb_id)
{
	var tmp_thumb = document.getElementById(thumb_id);
	if (!tmp_thumb) {
		return true;
	}

	var thumb = document.createElement('img');
	// IE��CSS��K�p������ɂ�setAttribute()������className�v���p�e�B��ݒ肵�Ȃ��Ƃ����Ȃ�
	thumb.className = 'thumbnail';
	thumb.setAttribute('src', thumb_url);
	thumb.setAttribute('hspace', 4);
	thumb.setAttribute('vspace', 4);
	thumb.setAttribute('align', 'middle');

	tmp_thumb.parentNode.replaceChild(thumb, tmp_thumb);

	// IE�ł͓ǂݍ��݊������Ă��烊�T�C�Y���Ȃ��ƕςȋ����ɂȂ�̂�
	if (navigator.userAgent.indexOf('MSIE' != -1)) {
		thumb.onload = function() {
			autoImgSize(thumb_id);
		}
	// ���̑�
	} else {
		autoImgSize(thumb_id);
	}

	return false;
}

/**
 * �ǂݍ��݂����������T���l�C����{���̃T�C�Y�ŕ\������
 */
function autoImgSize(thumb_id)
{
	var thumb = document.getElementById(thumb_id);
	if (!thumb) {
		return;
	}

	thumb.style.width = 'auto';
	thumb.style.height = 'auto';
}