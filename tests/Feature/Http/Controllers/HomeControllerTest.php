<?php
/**
 * NOTICE OF LICENSE.
 *
 * UNIT3D Community Edition is open-sourced software licensed under the GNU Affero General Public License v3.0
 * The details is bundled with this project in the file LICENSE.txt.
 *
 * @project    UNIT3D Community Edition
 *
 * @author     HDVinnie <hdinnovations@protonmail.com>
 * @license    https://www.gnu.org/licenses/agpl-3.0.en.html/ GNU Affero General Public License v3.0
 */

use App\Models\Article;
use App\Models\Bookmark;
use App\Models\FeaturedTorrent;
use App\Models\FreeleechToken;
use App\Models\Group;
use App\Models\Movie;
use App\Models\Poll;
use App\Models\Post;
use App\Models\Topic;
use App\Models\Torrent;
use App\Models\Tv;
use App\Models\User;

test('index returns an ok response', function (): void {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('home.index'));
    $response->assertOk();
    $response->assertViewIs('home.index');
    $response->assertViewHas('user');
    $response->assertViewHas('personal_freeleech');
    $response->assertViewHas('users');
    $response->assertViewHas('groups');
    $response->assertViewHas('articles');
    $response->assertViewHas('newest');
    $response->assertViewHas('seeded');
    $response->assertViewHas('dying');
    $response->assertViewHas('leeched');
    $response->assertViewHas('dead');
    $response->assertViewHas('topics');
    $response->assertViewHas('posts');
    $response->assertViewHas('featured');
    $response->assertViewHas('poll');
    $response->assertViewHas('uploaders');
    $response->assertViewHas('past_uploaders');
    $response->assertViewHas('freeleech_tokens');
    $response->assertViewHas('bookmarks');
});