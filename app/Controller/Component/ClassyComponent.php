<?php

/**
 * Most Common functions for general Programming
 * @author dharmendra
 */
App::uses('Component', 'Controller');

class ClassyComponent extends Component {

    public $components = array('Session');

    public function postslug($string) {
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
        $slug = explode('-', $slug);

        foreach ($slug as $k => $word) {
            // List of stop words comma separated
            $keys = explode(',', "a,about,above,after,again,against,all,am,an,and,any,are,aren't,as,at,be,because,been,before,being,below,between,both,but,by,can't,cannot,could,couldn't,did,didn't,do,does,doesn't,doing,don't,down,during,each,few,for,from,further,had,hadn't,has,hasn't,have,haven't,having,he,he'd,he'll,he's,her,here,here's,hers,herself,him,himself,his,how,how's,i,i'd,i'll,i'm,i've,if,in,into,is,isn't,it,it's,its,itself,let's,me,more,most,mustn't,my,myself,no,nor,not,of,off,on,once,only,or,other,ought,our,ours,ourselves,out,over,own,same,shan't,she,she'd,she'll,she's,should,shouldn't,so,some,such,than,that,that's,the,their,theirs,them,themselves,then,there,there's,these,they,they'd,they'll,they're,they've,this,those,through,to,too,under,until,up,very,was,wasn't,we,we'd,we'll,we're,we've,were,weren't,what,what's,when,when's,where,where's,which,while,who,who's,whom,why,why's,with,won't,would,wouldn't,you,you'd,you'll,you're,you've,your,yours,yourself,yourselves");

            foreach ($keys as $l => $wordfalse) {
                if ($word == $wordfalse) {
                    unset($slug[$k]);
                }
            }
        }

        return implode('-', $slug);
    }

    public static function systemInfo() {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $os_platform = "Unknown OS Platform";
        $os_array = array('/windows phone 8/i' => 'Windows Phone 8',
            '/windows phone os 7/i' => 'Windows Phone 7',
            '/windows nt 6.3/i' => 'Windows 8.1',
            '/windows nt 6.2/i' => 'Windows 8',
            '/windows nt 6.1/i' => 'Windows 7',
            '/windows nt 6.0/i' => 'Windows Vista',
            '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
            '/windows nt 5.1/i' => 'Windows XP',
            '/windows xp/i' => 'Windows XP',
            '/windows nt 5.0/i' => 'Windows 2000',
            '/windows me/i' => 'Windows ME',
            '/win98/i' => 'Windows 98',
            '/win95/i' => 'Windows 95',
            '/win16/i' => 'Windows 3.11',
            '/macintosh|mac os x/i' => 'Mac OS X',
            '/mac_powerpc/i' => 'Mac OS 9',
            '/linux/i' => 'Linux',
            '/ubuntu/i' => 'Ubuntu',
            '/iphone/i' => 'iPhone',
            '/ipod/i' => 'iPod',
            '/ipad/i' => 'iPad',
            '/android/i' => 'Android',
            '/blackberry/i' => 'BlackBerry',
            '/webos/i' => 'Mobile');
        $found = false;
        $device = '';
        foreach ($os_array as $regex => $value) {
            if ($found)
                break;
            else if (preg_match($regex, $user_agent)) {
                $os_platform = $value;
                $device = !preg_match('/(windows|mac|linux|ubuntu)/i', $os_platform) ? 'MOBILE' : (preg_match('/phone/i', $os_platform) ? 'MOBILE' : 'SYSTEM');
            }
        }
        $device = !$device ? 'SYSTEM' : $device;
        return array('os' => $os_platform, 'device' => $device);
    }

}