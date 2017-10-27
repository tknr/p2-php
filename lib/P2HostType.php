<?php

// {{{ P2HostType

/**
 * rep2 - p2用のユーティリティクラス
 * インスタンスを作らずにクラスメソッドで利用する
 *
 * @create  2017/10/19
 * @static
 */
class P2HostType
{
    // {{{ properties

    /**
     * isHost2ch() のキャッシュ
     */
    static private $_hostIs2ch = array();

    /**
     * isHost5ch() のキャッシュ
     */
    static private $_hostIs5ch = array();

    /**
     * isHostBe2chNet() のキャッシュ
     */
    //static private $_hostIsBe2chNet = array();

    /**
     * isHostBbsPink() のキャッシュ
     */
    static private $_hostIsBbsPink = array();

    /**
     * isHostMachiBbs() のキャッシュ
     */
    static private $_hostIsMachiBbs = array();

    /**
     * isHostMachiBbsNet() のキャッシュ
     */
    static private $_hostIsMachiBbsNet = array();

    /**
     * isHostJbbsShitaraba() のキャッシュ
     */
    static private $_hostIsJbbsShitaraba = array();

    /**
     * isHostVip2ch()のキャッシュ
     */
    static private $_hostIsVip2ch = array();

    /**
     * isHost2chSc()のキャッシュ
     */
    static private $_hostIs2chSc = array();

    /**
     * isHostOpen2ch()のキャッシュ
     */
    static private $_hostIsOpen2ch = array();

    // }}}
    // {{{ getHostGroupName()

    /**
     * ホストに対応するお気に板・お気にスレグループ名を取得する
     *
     * @param string $host
     * @return void
     */
    static public function getHostGroupName($host)
    {
        if (self::isHost2chs($host)) {
            return '2channel';
        } elseif (self::isHostMachiBbs($host)) {
            return 'machibbs';
        } elseif (self::isHostJbbsShitaraba($host)) {
            return 'shitaraba';
        } elseif (self::isHostVip2ch($host)) {
            return 'vip2ch';
        } else {
            return $host;
        }
    }

    // }}}
    // {{{ isHostExample

    /**
     * host が例示用ドメインなら true を返す
     *
     * @param string $host
     * @return bool
     */
    static public function isHostExample($host)
    {
        return (bool)preg_match('/(?:^|\\.)example\\.(?:com|net|org|jp)$/i', $host);
    }

    // }}}
    // {{{ isHost2chs()

    /**
     * host が 2ch or 5ch or bbspink なら true を返す
     *
     * @param string $host
     * @return bool
     */
    static public function isHost2chs($host)
    {
        return self::isHost2ch($host) || self::isHost5ch($host) || self::isHostBbsPink($host);
    }

    // }}}
    // {{{ isHostBe2chs()

    /**
     * host が be.2ch.net or be.5ch.net なら true を返す
     *
     * @param string $host
     * @return bool
     */
    static public function isHostBe2chs($host)
    {
        return self::isHostBe2chNet($host) || self::isHostBe5chNet($host);
    }

    // }}}
    // {{{ isNotUse2chsAPI()

    /**
     * host が API を用いなくても取得できる場合なら true を返す
     *
     * @param string $host
     * @return bool
     */
    static public function isNotUse2chsAPI($host)
    {
        return self::isNotUse2chAPI($host) || self::isNotUse5chAPI($host);
    }

    // }}}
    // {{{ isHost2ch()

    /**
     * host が 2ch なら true を返す
     *
     * @param string $host
     * @return bool
     */
    static public function isHost2ch($host)
    {
        if (!array_key_exists($host, self::$_hostIs2ch)) {
            self::$_hostIs2ch[$host] = (bool)preg_match('<^\\w+\\.(?:2ch\\.net)$>', $host);
        }
        return self::$_hostIs2ch[$host];
    }

    // }}}
    // {{{ isHostBe2chNet()

    /**
     * host が be.2ch.net なら true を返す
     *
     * @param string $host
     * @return bool
     */
    static public function isHostBe2chNet($host)
    {
        return $host == 'be.2ch.net';
    }

    // }}}
    // {{{ isNotUse2chAPI()

    /**
     * host が API を用いなくても取得できる場合なら true を返す
     *
     * @param string $host
     * @return bool
     */
    static public function isNotUse2chAPI($host)
    {
        return ($host == 'qb5.2ch.net' || $host == 'carpenter.2ch.net');
    }

    // }}}
    // {{{ isHost5ch()

    /**
     * host が 5ch なら true を返す
     *
     * @param string $host
     * @return bool
     */
    static public function isHost5ch($host)
    {
        if (!array_key_exists($host, self::$_hostIs5ch)) {
            self::$_hostIs5ch[$host] = (bool)preg_match('<^\\w+\\.(?:5ch\\.net)$>', $host);
        }
        return self::$_hostIs5ch[$host];
    }

    // }}}
    // {{{ isHostBe5chNet()

    /**
     * host が be.2ch.net なら true を返す
     *
     * @param string $host
     * @return bool
     */
    static public function isHostBe5chNet($host)
    {
        return $host == 'be.5ch.net';
    }

    // }}}
    // {{{ isNotUse5chAPI()

    /**
     * host が API を用いなくても取得できる場合なら true を返す
     *
     * @param string $host
     * @return bool
     */
    static public function isNotUse5chAPI($host)
    {
        return ($host == 'qb5.5ch.net' || $host == 'carpenter.5ch.net');
    }

    // }}}
    // {{{ isHostBbsPink()

    /**
     * host が bbspink なら true を返す
     *
     * @param string $host
     * @return bool
     */
    static public function isHostBbsPink($host)
    {
        if (!array_key_exists($host, self::$_hostIsBbsPink)) {
            self::$_hostIsBbsPink[$host] = (bool)preg_match('<^\\w+\\.bbspink\\.com$>', $host);
        }
        return self::$_hostIsBbsPink[$host];
    }

    // }}}
    // {{{ isHost2chSc()

    /**
     * host が 2ch.sc なら true を返す
     *
     * @param string $host
     * @return  boolean
     */
    static public function isHost2chSc($host)
    {
        if (!array_key_exists($host, self::$_hostIs2chSc)) {
            self::$_hostIs2chSc[$host] = (bool)preg_match('/\\.(2ch\\.sc)$/', $host);
        }
        return self::$_hostIs2chSc[$host];
    }

    // }}}
    // {{{ isHostOpen2ch()

    /**
     * host が おーぷん2ch なら true を返す
     *
     * @param string $host
     * @return  boolean
     */
    static public function isHostOpen2ch($host)
    {
        if (!array_key_exists($host, self::$_hostIsOpen2ch)) {
            self::$_hostIsOpen2ch[$host] = (bool)preg_match('/\\.(open2ch\\.net)$/', $host);
        }
        return self::$_hostIsOpen2ch[$host];
    }

    // }}}
    // {{{ isHostMachiBbs()

    /**
     * host が machibbs なら true を返す
     *
     * @param string $host
     * @return bool
     */
    static public function isHostMachiBbs($host)
    {
        if ($host === "machi.to") {
            return true;
        }

        if (!array_key_exists($host, self::$_hostIsMachiBbs)) {
            self::$_hostIsMachiBbs[$host] = (bool)preg_match('<^\\w+\\.machi(?:bbs\\.com|\\.to)$>', $host);
        }
        return self::$_hostIsMachiBbs[$host];
    }

    // }}}
    // {{{ isHostMachiBbsNet()

    /**
     * host が machibbs.net まちビねっと なら true を返す
     *
     * @param string $host
     * @return bool
     */
    static public function isHostMachiBbsNet($host)
    {
        if (!array_key_exists($host, self::$_hostIsMachiBbsNet)) {
            self::$_hostIsMachiBbsNet[$host] = (bool)preg_match('<^\\w+\\.machibbs\\.net$>', $host);
        }
        return self::$_hostIsMachiBbsNet[$host];
    }

    // }}}
    // {{{ isHostJbbsShitaraba()

    /**
     * host が livedoor レンタル掲示板 : したらば なら true を返す
     *
     * @param string $host
     * @return bool
     */
    static public function isHostJbbsShitaraba($in_host)
    {
        if (!array_key_exists($in_host, self::$_hostIsJbbsShitaraba)) {
            if ($in_host == 'rentalbbs.livedoor.com') {
                self::$_hostIsJbbsShitaraba[$in_host] = true;
            } elseif (preg_match('<^jbbs\\.(?:shitaraba\\.(?:net|com)|livedoor\\.(?:com|jp))(?:/|$)>', $in_host)) {
                self::$_hostIsJbbsShitaraba[$in_host] = true;
            } else {
                self::$_hostIsJbbsShitaraba[$in_host] = false;
            }
        }
        return self::$_hostIsJbbsShitaraba[$in_host];
    }

    // }}}
    // {{{ adjustHostJbbs()

    /**
     * livedoor レンタル掲示板 : したらばのホスト名変更に対応して変更する
     *
     * @param   string $in_str ホスト名でもURLでもなんでも良い
     * @return  string
     */
    static public function adjustHostJbbs($in_str)
    {
        return preg_replace('<(^|/)jbbs\\.(?:shitaraba|livedoor)\\.(?:net|com)(/|$)>', '\\1jbbs.shitaraba.net\\2', $in_str, 1);
    }

    // }}}
    // {{{ isHostTor()

    /**
     * host が tor 系板 なら true を返す
     *
     * @access public
     * @param string $host
     * @return boolean
     */
    static function isHostTor($host, $isGatewayMode = 99)
    {
        switch ($isGatewayMode) {
            case 0:
                $ret = (bool)preg_match('/\\.onion$/', $host);
                break;

            case 1:
                $ret = (bool)preg_match('/\\.(onion\\.cab|onion\\.city|onion\\.direct|onion\\.link|onion\\.nu|onion\\.to|onion\\.rip)$/', $host);
                break;

            default:
                $ret = (bool)preg_match('/\\.(onion\\.cab|onion\\.city|onion\\.direct|onion\\.link|onion\\.nu|onion\\.to|onion\\.rip|onion)$/', $host);
                break;
        }

        return $ret;
    }

    // }}}
    // {{{ isHostVip2ch()

    /**
     * host が vip2ch なら true を返す
     *
     * @param string $host
     * @return bool
     */
    static public function isHostVip2ch($host)
    {
        if (!array_key_exists($host, self::$_hostIsVip2ch)) {
            self::$_hostIsVip2ch[$host] = (bool)preg_match('<^\\w+\\.(?:vip2ch\\.com)$>', $host);
        }
        return self::$_hostIsVip2ch[$host];
    }

    // }}}
    // {{{ isUrlWikipediaJa()

    /**
     * URLがウィキペディア日本語版の記事ならtrueを返す
     */
    static public function isUrlWikipediaJa($url)
    {
        return (strncmp($url, 'http://ja.wikipedia.org/wiki/', 29) == 0);
    }

    // }}}
}

// }}}

/*
 * Local Variables:
 * mode: php
 * coding: cp932
 * tab-width: 4
 * c-basic-offset: 4
 * indent-tabs-mode: nil
 * End:
 */
// vim: set syn=php fenc=cp932 ai et ts=4 sw=4 sts=4 fdm=marker:
