src/application/views/account/register.php[36m:[m[1;31m<? [mshow_form_errors($errors); ?>
src/application/views/account/register.php[36m:[m		[1;31m<? [m// $this->load->view('account/oauth_buttons'); ?>
src/application/views/alerts/alerts.php[36m:[m    <p id="alerts-controls" class="text-right [1;31m<? [mif(count($alerts) == 0) echo 'hidden'; ?>">
src/application/views/alerts/alerts.php[36m:[m  <p id="no-alerts" class="text-center text-muted [1;31m<? [mif(count($alerts) > 0) echo 'hidden'; ?>">
src/application/views/alerts/alerts.php[36m:[m  [1;31m<? [mforeach($alerts as $alert): ?>
src/application/views/alerts/alerts.php[36m:[m      [1;31m<? [mif(!$alert['clicked']): ?>
src/application/views/alerts/alerts.php[36m:[m      [1;31m<? [mendif; ?>
src/application/views/alerts/alerts.php[36m:[m        [1;31m<? [mif($alert['show_user_link']): ?>
src/application/views/alerts/alerts.php[36m:[m        [1;31m<? [mendif; ?>
src/application/views/alerts/alerts.php[36m:[m        [1;31m<? [mif($alert['url']): ?>
src/application/views/alerts/alerts.php[36m:[m        [1;31m<? [mendif; ?>
src/application/views/alerts/alerts.php[36m:[m  [1;31m<? [mendforeach; ?>
src/application/views/dashboard.php[36m:[m    [1;31m<? [m$this->load->view('posts/post_box') ?>
src/application/views/dashboard.php[36m:[m    [1;31m<? [mif($show_follow_msg): ?>
src/application/views/dashboard.php[36m:[m    [1;31m<? [mendif; ?>
src/application/views/dashboard.php[36m:[m    [1;31m<? [m$this->load->view('posts/loading') ?>
src/application/views/dashboard.php[36m:[m    [1;31m<? [m$this->load->view('sidebar/main', array('dashboard'=>'true')) ?>
src/application/views/dashboard.php[36m:[m    [1;31m<? [m$this->load->view('sidebar/follows') ?>
src/application/views/emails/template.php[36m:[m[1;31m<? [mif(isset($show_unsubscribe)): ?>
src/application/views/emails/template.php[36m:[m[1;31m<? [mendif; ?>
src/application/views/employee/template.php[36m:[m	  <li [1;31m<? [mif($tab === 'users') echo 'class="active"'; ?>><a href="<?=base_url('employee')?>">Users</a></li>
src/application/views/employee/template.php[36m:[m	  <li [1;31m<? [mif($tab === 'notes') echo 'class="active"'; ?>><a href="<?=base_url('employee/notes')?>">Notes</a></li>
src/application/views/employee/template.php[36m:[m	  <li [1;31m<? [mif($tab === 'reports') echo 'class="active"'; ?>><a href="<?=base_url('employe/reports')?>">Reports</a></li>
src/application/views/employee/template.php[36m:[m	[1;31m<? [m$this->load->view('employee/'.$tab); ?>
src/application/views/employee/users.php[36m:[m    [1;31m<? [mforeach($users as $user): ?>
src/application/views/employee/users.php[36m:[m    [1;31m<? [mendforeach; ?>
src/application/views/navbar.php[36m:[m[1;31m<? [mif(session_get('loggedin')): ?>
src/application/views/navbar.php[36m:[m[1;31m<? [melse: ?>
src/application/views/navbar.php[36m:[m[1;31m<? [mendif; ?>
src/application/views/oauth/new_account.php[36m:[m    [1;31m<? [mif(isset($_GET['clear'])): ?>
src/application/views/oauth/new_account.php[36m:[m    [1;31m<? [mendif; ?>
src/application/views/people/list_users.php[36m:[m	[1;31m<? [mforeach($users as $user): ?>
src/application/views/people/list_users.php[36m:[m		[1;31m<? [mif(session_get('userid') != $user['id']): ?>
src/application/views/people/list_users.php[36m:[m			[1;31m<? [mif($user['is_following']): ?>
src/application/views/people/list_users.php[36m:[m			[1;31m<? [melse: ?>
src/application/views/people/list_users.php[36m:[m			[1;31m<? [mendif; ?>
src/application/views/people/list_users.php[36m:[m		[1;31m<? [mendif; ?>
src/application/views/people/list_users.php[36m:[m	[1;31m<? [mendforeach; ?>
src/application/views/people/profile/edit/links.php[36m:[m		[1;31m<? [mif(count($links) < 1): ?>
src/application/views/people/profile/edit/links.php[36m:[m		[1;31m<? [mendif; ?>
src/application/views/people/profile/edit/links.php[36m:[m			[1;31m<? [m$increment = 0; ?>
src/application/views/people/profile/edit/links.php[36m:[m			[1;31m<? [mforeach($links as $row): ?>
src/application/views/people/profile/edit/links.php[36m:[m			[1;31m<? [m$increment++; ?>
src/application/views/people/profile/edit/links.php[36m:[m			[1;31m<? [mendforeach; ?>
src/application/views/people/profile/page.php[36m:[m              [1;31m<? [mif( $birthday && date('m-d') == date('m-d', strtotime($birthday)) ): ?>
src/application/views/people/profile/page.php[36m:[m              [1;31m<? [mendif; ?>
src/application/views/people/profile/page.php[36m:[m              [1;31m<? [mif($employee): ?>
src/application/views/people/profile/page.php[36m:[m              [1;31m<? [mendif; ?>
src/application/views/people/profile/page.php[36m:[m              [1;31m<? [mif($official == 1): ?>
src/application/views/people/profile/page.php[36m:[m              [1;31m<? [mendif; ?>
src/application/views/people/profile/page.php[36m:[m            [1;31m<? [mif($website_url): ?>
src/application/views/people/profile/page.php[36m:[m            [1;31m<? [mendif; ?>
src/application/views/people/profile/page.php[36m:[m          [1;31m<? [mif(!$is_owner): ?>
src/application/views/people/profile/page.php[36m:[m            [1;31m<? [mif(!$is_following): ?>
src/application/views/people/profile/page.php[36m:[m            [1;31m<? [melse: ?>
src/application/views/people/profile/page.php[36m:[m            [1;31m<? [mendif; ?>
src/application/views/people/profile/page.php[36m:[m          [1;31m<? [melseif($is_owner && $tab !== 'about'): ?>
src/application/views/people/profile/page.php[36m:[m          [1;31m<? [mendif; ?>
src/application/views/people/profile/page.php[36m:[m        <li[1;31m<? [mif($tab==null) echo ' class="active"'?>>
src/application/views/people/profile/page.php[36m:[m        <li[1;31m<? [mif($tab=='comments') echo ' class="active"'?>>
src/application/views/people/profile/page.php[36m:[m        <li class="divider[1;31m<? [mif($tab=='about') echo ' active'?>">
src/application/views/people/profile/page.php[36m:[m        <li[1;31m<? [mif($tab=='points') echo ' class="active"'?>>
src/application/views/people/profile/page.php[36m:[m        <li[1;31m<? [mif($tab=='followers') echo ' class="active"'?>>
src/application/views/people/profile/page.php[36m:[m        <li[1;31m<? [mif($tab=='following') echo ' class="active"'?>>
src/application/views/people/profile/tab/about.php[36m:[m			[1;31m<? [mif($is_owner): ?>
src/application/views/people/profile/tab/about.php[36m:[m			[1;31m<? [mendif; ?>
src/application/views/people/profile/tab/about.php[36m:[m			[1;31m<? [mif($name): ?>
src/application/views/people/profile/tab/about.php[36m:[m			[1;31m<? [mendif; ?>
src/application/views/people/profile/tab/about.php[36m:[m			[1;31m<? [mif($is_owner): ?>
src/application/views/people/profile/tab/about.php[36m:[m			[1;31m<? [mendif; ?>
src/application/views/people/profile/tab/about.php[36m:[m				[1;31m<? [mif($tagline): ?>
src/application/views/people/profile/tab/about.php[36m:[m				[1;31m<? [melse: ?>
src/application/views/people/profile/tab/about.php[36m:[m				[1;31m<? [mendif; ?>
src/application/views/people/profile/tab/about.php[36m:[m				[1;31m<? [mif($bio): ?>
src/application/views/people/profile/tab/about.php[36m:[m				[1;31m<? [melse: ?>
src/application/views/people/profile/tab/about.php[36m:[m				[1;31m<? [mendif; ?>
src/application/views/people/profile/tab/about.php[36m:[m			[1;31m<? [mif($birthday): ?>
src/application/views/people/profile/tab/about.php[36m:[m			[1;31m<? [mendif; ?>
src/application/views/people/profile/tab/about.php[36m:[m			[1;31m<? [mif($is_owner): ?>
src/application/views/people/profile/tab/about.php[36m:[m			[1;31m<? [mendif; ?>
src/application/views/people/profile/tab/about.php[36m:[m				[1;31m<? [mif($website_url): ?>
src/application/views/people/profile/tab/about.php[36m:[m				[1;31m<? [melse: ?>
src/application/views/people/profile/tab/about.php[36m:[m				[1;31m<? [mendif; ?>
src/application/views/people/profile/tab/about.php[36m:[m				[1;31m<? [mif(count($links) < 1): ?>
src/application/views/people/profile/tab/about.php[36m:[m				[1;31m<? [mendif; ?>
src/application/views/people/profile/tab/about.php[36m:[m				[1;31m<? [mforeach($links as $row): ?>
src/application/views/people/profile/tab/about.php[36m:[m				[1;31m<? [mendforeach; ?>
src/application/views/people/profile/tab/about.php[36m:[m			[1;31m<? [mif($is_owner): ?>
src/application/views/people/profile/tab/about.php[36m:[m			[1;31m<? [mendif; ?>
src/application/views/people/profile/tab/about.php[36m:[m				[1;31m<? [mif($favorite_movies): ?>
src/application/views/people/profile/tab/about.php[36m:[m				[1;31m<? [melse: ?>
src/application/views/people/profile/tab/about.php[36m:[m				[1;31m<? [mendif; ?>
src/application/views/people/profile/tab/about.php[36m:[m				[1;31m<? [mif($favorite_tv): ?>
src/application/views/people/profile/tab/about.php[36m:[m				[1;31m<? [melse: ?>
src/application/views/people/profile/tab/about.php[36m:[m				[1;31m<? [mendif; ?>
src/application/views/people/profile/tab/about.php[36m:[m				[1;31m<? [mif($favorite_music): ?>
src/application/views/people/profile/tab/about.php[36m:[m				[1;31m<? [melse: ?>
src/application/views/people/profile/tab/about.php[36m:[m				[1;31m<? [mendif; ?>
src/application/views/people/profile/tab/about.php[36m:[m				[1;31m<? [mif($favorite_quotes): ?>
src/application/views/people/profile/tab/about.php[36m:[m				[1;31m<? [melse: ?>
src/application/views/people/profile/tab/about.php[36m:[m				[1;31m<? [mendif; ?>
src/application/views/people/profile/tab/debates.php[36m:[m    [1;31m<? [mif($posts_count < 1): ?>
src/application/views/people/profile/tab/debates.php[36m:[m    [1;31m<? [mendif;?>
src/application/views/people/profile/tab/debates.php[36m:[m  [1;31m<? [m$this->load->view('posts/loading') ?>
src/application/views/posts/comments.php[36m:[m[1;31m<? [mforeach($comments as $comment): ?>
src/application/views/posts/comments.php[36m:[m[1;31m<? [mendforeach; ?>
src/application/views/posts/html_template.php[36m:[m[1;31m<? [mforeach($posts as $post): ?>
src/application/views/posts/html_template.php[36m:[m[1;31m<? [mendforeach; ?>
src/application/views/posts/report.php[36m:[m[1;31m<? [mif($is_owner): ?>
src/application/views/posts/report.php[36m:[m[1;31m<? [melse: ?>
src/application/views/posts/report.php[36m:[m      [1;31m<? [mforeach($reasons as $key => $value): ?>
src/application/views/posts/report.php[36m:[m      [1;31m<? [mendforeach; ?>
src/application/views/posts/report.php[36m:[m[1;31m<? [mendif; ?>
src/application/views/posts/view.php[36m:[m      [1;31m<? [mif($info['comments_count'] > COMMENT_DISPLAY_LIMIT): ?>
src/application/views/posts/view.php[36m:[m      [1;31m<? [mendif; ?>
src/application/views/search/results.php[36m:[m    [1;31m<? [mif($results_count < 1): ?>
src/application/views/search/results.php[36m:[m    [1;31m<? [mendif; ?>
src/application/views/settings/oauth.php[36m:[m  [1;31m<? [mforeach($providers as $provider): ?>
src/application/views/settings/oauth.php[36m:[m      [1;31m<? [mif(in_array($provider['name'], $connected)): ?>
src/application/views/settings/oauth.php[36m:[m      [1;31m<? [melse: ?>
src/application/views/settings/oauth.php[36m:[m      [1;31m<? [mendif; ?>
src/application/views/settings/oauth.php[36m:[m  [1;31m<? [mendforeach; ?>
src/application/views/settings/password.php[36m:[m[1;31m<? [mif($existing_password): ?>
src/application/views/settings/password.php[36m:[m[1;31m<? [melse: ?>
src/application/views/settings/password.php[36m:[m[1;31m<? [mendif; ?>
src/application/views/settings/password.php[36m:[m      [1;31m<? [mif($existing_password): ?>
src/application/views/settings/password.php[36m:[m      [1;31m<? [mendif; ?>
src/application/views/settings/security.php[36m:[m  [1;31m<? [mforeach($events as $event): ?>
src/application/views/settings/security.php[36m:[m      [1;31m<? [mif($event['value']): ?>
src/application/views/settings/security.php[36m:[m      [1;31m<? [mendif; ?>
src/application/views/settings/security.php[36m:[m      [1;31m<? [mif($event['ip'] == $_SERVER['REMOTE_ADDR']):?>
src/application/views/settings/security.php[36m:[m      [1;31m<? [mendif; ?>
src/application/views/settings/security.php[36m:[m  [1;31m<? [mendforeach; ?>
src/application/views/settings/template.php[36m:[m  <li class="[1;31m<? [mif($tab=='account') echo 'active' ?>"><a href="account">Account</a></li>
src/application/views/settings/template.php[36m:[m  <li class="[1;31m<? [mif($tab=='security') echo 'active' ?>"><a href="security">Security</a></li>
src/application/views/settings/template.php[36m:[m  <li class="[1;31m<? [mif($tab=='password') echo 'active' ?>"><a href="password">Password</a></li>
src/application/views/settings/template.php[36m:[m  <li class="[1;31m<? [mif($tab=='oauth') echo 'active' ?>"><a href="oauth">Apps</a></li>
src/application/views/settings/template.php[36m:[m  <li class="[1;31m<? [mif($tab=='labs') echo 'active' ?>"><a href="experimental">Labs</a></li>
src/application/views/settings/template.php[36m:[m[1;31m<? [m$this->load->view('settings/'.$tab); ?>
src/application/views/sidebar/follows.php[36m:[m[1;31m<? [mif(session_get('loggedin')): ?>
src/application/views/sidebar/follows.php[36m:[m    [1;31m<? [m$following = $this->people_model->get_follows('following', null, 12); ?>
src/application/views/sidebar/follows.php[36m:[m    [1;31m<? [mforeach($following as $user): ?>
src/application/views/sidebar/follows.php[36m:[m    [1;31m<? [mendforeach;?>
src/application/views/sidebar/follows.php[36m:[m    [1;31m<? [mif(count($following) > 0): ?>
src/application/views/sidebar/follows.php[36m:[m    [1;31m<? [melse: ?>
src/application/views/sidebar/follows.php[36m:[m    [1;31m<? [mendif; ?>
src/application/views/sidebar/follows.php[36m:[m    [1;31m<? [m$followers = $this->people_model->get_follows('followers', null, 10); ?>
src/application/views/sidebar/follows.php[36m:[m    [1;31m<? [mforeach($followers as $user): ?>
src/application/views/sidebar/follows.php[36m:[m    [1;31m<? [mendforeach;?>
src/application/views/sidebar/follows.php[36m:[m    [1;31m<? [mif(count($followers) > 0): ?>
src/application/views/sidebar/follows.php[36m:[m    [1;31m<? [melse: ?>
src/application/views/sidebar/follows.php[36m:[m    [1;31m<? [mendif; ?>
src/application/views/sidebar/follows.php[36m:[m[1;31m<? [mendif; ?>
src/application/views/sidebar/main.php[36m:[m[1;31m<? [mif(!session_get('loggedin')): ?>
src/application/views/sidebar/main.php[36m:[m[1;31m<? [mendif; ?>
src/application/views/templates/msg_box.php[36m:[m[1;31m<? [mif($msg['exists']): ?><br>
src/application/views/templates/msg_box.php[36m:[m[1;31m<? [mendif; ?>
src/application/views/templates/validation_errors.php[36m:[m[1;31m<? [mif($errors): ?>
src/application/views/templates/validation_errors.php[36m:[m[1;31m<? [mendif; ?>
