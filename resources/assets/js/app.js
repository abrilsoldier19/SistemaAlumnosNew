// Source - https://stackoverflow.com/a/76532041
// Posted by Rana Muhammad Rameez, modified by community. See post 'Timeline' for change history
// Retrieved 2026-09-28, License - CC BY-SA 4.0

import './bootstrap';
import '../../css/app.css';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();
