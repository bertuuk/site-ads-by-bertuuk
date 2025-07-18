import { registerBlockType } from '@wordpress/blocks';
import edit from './edit';
import save from './save';

registerBlockType('site-ads-by-bertuuk/adsense-banner', {
	edit,
	save,
});