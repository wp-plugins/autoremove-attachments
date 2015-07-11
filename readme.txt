=== Autoremove Attachments ===
Contributors: PolygonThemes, EusebiuOprinoiu
Tags: media, attachment, post, page, custom post type
Requires at least: 3.5
Tested up to: 4.2.2
Stable tag: 1.0.1
License: GNU General Public License version 3.0

Remove child attachments when parent post, page or custom post type is deleted

== Description ==

Autoremove Attachments helps you keep your media library clean by deleting all media files attached to a post when that post gets removed from your website.

By default, WordPress doesn't remove child attachments leaving orphan files behind. Using this plugin you won't have to manually track and remove them.

== Installation ==

1. Upload autoremove-attachments to the /wp-content/plugins/ directory
2. Activate Autoremove Attachments through the 'Plugins' menu from the WordPress dashboard

No furter configuration is needed. The plugin has no options page. It just works.

== Frequently Asked Questions ==

= Does it work with custom post types? =

Yes, it does. It works with posts, pages and custom post types. All child attachments are removed when the parent entry is deleted.

= Attachments are still available in the media library after the post was deleted. Why? =

The files are removed only when the parent posts are permanently removed from the system. You need to empty your trash.

= Are there any restrictions on how I can use my attachments? =

Unfortunately, yes! You need to make sure that you don't insert the files into multiple posts. If you do and the parent post is deleted you will end up with missing images.

If you need to use the same image over and over again, upload it from the Media Library ( Media > Add New ). This way the image won't be attached to any post and you'll be able to use it without restrictions.

== Changelog ==

= Version 1.0.1 =
* Minimum required version of PHP set to 5.3

= Version 1.0.0 =
* First release
