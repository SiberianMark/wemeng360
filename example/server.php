<?php
/**
 * 微信公众平台 PHP SDK 示例文件
 *
 * @author NetPuter <netputer@gmail.com>
 */

  require('../src/Wechat.php');

  /**
   * 微信公众平台演示类
   */
  class MyWechat extends Wechat {

    /**
     * 用户关注时触发，回复「欢迎关注」
     *
     * @return void
     */
    protected function onSubscribe() {
      $this->responseText('欢迎关注');
    }

    /**
     * 用户取消关注时触发
     *
     * @return void
     */
    protected function onUnsubscribe() {
      // 「悄悄的我走了，正如我悄悄的来；我挥一挥衣袖，不带走一片云彩。」
    }

    /**
     * 收到文本消息时触发，回复收到的文本消息内容
     *
     * @return void
     */
    protected function onText() {
      $this->responseText('收到了文字消息：' . $this->getRequest('content'));
    }

    /**
     * 收到图片消息时触发，回复由收到的图片组成的图文消息
     *
     * @return void
     */
    protected function onImage() {
      $items = array(
        new NewsResponseItem('标题一', '描述一', $this->getRequest('picurl'), $this->getRequest('picurl')),
        new NewsResponseItem('标题二', '描述二', $this->getRequest('picurl'), $this->getRequest('picurl')),
      );

      $this->responseNews($items);
    }

    /**
     * 收到地理位置消息时触发，回复收到的地理位置
     *
     * @return void
     */
    protected function onLocation() {
      $num = 1 / 0;
      // 故意触发错误，用于演示调试功能

      $this->responseText('收到了位置消息：' . $this->getRequest('location_x') . ',' . $this->getRequest('location_y'));
    }

    /**
     * 收到链接消息时触发，回复收到的链接地址
     *
     * @return void
     */
    protected function onLink() {
      $this->responseText('收到了链接：' . $this->getRequest('url'));
    }

    /**
     * 收到未知类型消息时触发，回复收到的消息类型
     *
     * @return void
     */
    protected function onUnknown() {
      $this->responseText('收到了未知类型消息：' . $this->getRequest('msgtype'));
    }
      
     //设置菜单
    public function menu() {
        $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=" . $this->_access_token;
        $data = '{
                  "button": [
                    {
                      "type": "button",
                      "name": "活动",
                      "sub_button": [
                        {
                          "type": "view",
                          "name": "当前活动",
                          "url" : "' . $this->getWxurl($this->_host . "/college/CurrentActivity.html") . '"
                        },
                        {
                          "type": "view",
                          "name": "活动回顾",
                          "url" : "' . $this->getWxurl($this->_host . "/college/followActivity.html") . '"
                        }
                      ]
                    },
                    {
                      "type": "button",
                      "name": "课程",
                      "sub_button": [
                        {
                          "type": "view",
                          "name": "公开课",
                          "url" : "' . $this->getWxurl($this->_host . "/college/Classroom.html?type=1") . '"
                        },
                        {
                          "type": "view",
                          "name": "神马训练营",
                          "url" : "' . $this->getWxurl($this->_host . "/college/Classroom.html?type=2") . '"
                        },
                        {
                          "type": "view",
                          "name": "课程需求",
                          "url" : "' . $this->getWxurl($this->_host . "/college/classDemand.html") . '"
                        },
                        {
                          "type": "view",
                          "name": "讲师介绍",
                          "url" : "' . $this->getWxurl($this->_host . "/college/lecturer_list.html") . '"
                        }
                      ]
                    },
                    {
                      "type": "button",
                      "name": "更多",
                      "sub_button": [
                        {
                          "type": "view",
                          "name": "个人中心",
                          "url" : "' . $this->getWxurl($this->_host . "/college/me.html") . '"
                        },
                        {
                          "type": "view",
                          "name": "常见问题",
                          "url": "' . $this->getWxurl($this->_host . "/college/questionsList.html") . '"
                        },
                        {
                          "type": "view",
                          "name": "下载APP",
                          "url" : "' . $this->getWxurl($this->_host) . '"
                        },
                        {
                          "type": "view",
                          "name": "关于我们",
                          "url": "' . $this->getWxurl($this->_host . "/college/AboutUs.html") . '"
                        }
                      ]
                    }
                  ]
                }';
        $result = $this->httpPost($url, $data);
        echo $result;
    }
      
    
  }
class WechatMenu extends Wechat{
	 /**
     * 设置菜单
     */
    public function menu() {
        /* $this->checkParam(array('wxappid'));
        $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=" . $this->_wxWechat->getAccessToken();
        $menu = D('Wxapp')->where("appid='" . $this->_wxappid . "'")->getField('menu');
        if (!empty($menu)) {
            $data = json_decode($menu, true);
            foreach ($data['button'] as $key => $value) {
                if (isset($value['url']) && !empty($value['url'])) {
                    $data['button'][$key]['url'] = $this->_wxWechat->getWxurl($value['url']);
                }
                if (isset($value['sub_button']) && !empty($value['sub_button'])) {
                    foreach ($value['sub_button'] as $k => $v) {
                        if (isset($v['url']) && !empty($v['url'])) {
                            $data['button'][$key]['sub_button'][$k]['url'] = $this->_wxWechat->getWxurl($v['url']);
                        }
                    }
                }
            }
        }
        $result = $this->_wxWechat->httpPost($url, json_encode($data, JSON_UNESCAPED_UNICODE));
        echo $result;*/
    }

    /**
     * 获取菜单
     */
    public function getmenu() {
        /*  $this->checkParam(array('wxappid'));
        $url = "https://api.weixin.qq.com/cgi-bin/menu/get?access_token=" . $this->_wxWechat->getAccessToken();
        $result = $this->_wxWechat->http_request($url);
        echo $result;*/
    }

}

  $wechat = new MyWechat('mashaobin', TRUE);
  $wechat->run();
