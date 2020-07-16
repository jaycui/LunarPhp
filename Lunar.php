<?php

namespace chinese_lunar;

use app\Utils\BaZi;
use app\Utils\DiZhi;
use app\Utils\ShengXiao;
use app\Utils\TianGan;
use app\Utils\WuXing;

class Lunar
{

    public $MIN_YEAR = 1891;
    public $MAX_YEAR = 2100;
    public $lunarInfo = array(

        array(0, 2, 9, 21936), array(6, 1, 30, 9656), array(0, 2, 17, 9584), array(0, 2, 6, 21168), array(5, 1, 26, 43344), array(0, 2, 13, 59728),

        array(0, 2, 2, 27296), array(3, 1, 22, 44368), array(0, 2, 10, 43856), array(8, 1, 30, 19304), array(0, 2, 19, 19168), array(0, 2, 8, 42352),

        array(5, 1, 29, 21096), array(0, 2, 16, 53856), array(0, 2, 4, 55632), array(4, 1, 25, 27304), array(0, 2, 13, 22176), array(0, 2, 2, 39632),

        array(2, 1, 22, 19176), array(0, 2, 10, 19168), array(6, 1, 30, 42200), array(0, 2, 18, 42192), array(0, 2, 6, 53840), array(5, 1, 26, 54568),

        array(0, 2, 14, 46400), array(0, 2, 3, 54944), array(2, 1, 23, 38608), array(0, 2, 11, 38320), array(7, 2, 1, 18872), array(0, 2, 20, 18800),

        array(0, 2, 8, 42160), array(5, 1, 28, 45656), array(0, 2, 16, 27216), array(0, 2, 5, 27968), array(4, 1, 24, 44456), array(0, 2, 13, 11104),

        array(0, 2, 2, 38256), array(2, 1, 23, 18808), array(0, 2, 10, 18800), array(6, 1, 30, 25776), array(0, 2, 17, 54432), array(0, 2, 6, 59984),

        array(5, 1, 26, 27976), array(0, 2, 14, 23248), array(0, 2, 4, 11104), array(3, 1, 24, 37744), array(0, 2, 11, 37600), array(7, 1, 31, 51560),

        array(0, 2, 19, 51536), array(0, 2, 8, 54432), array(6, 1, 27, 55888), array(0, 2, 15, 46416), array(0, 2, 5, 22176), array(4, 1, 25, 43736),

        array(0, 2, 13, 9680), array(0, 2, 2, 37584), array(2, 1, 22, 51544), array(0, 2, 10, 43344), array(7, 1, 29, 46248), array(0, 2, 17, 27808),

        array(0, 2, 6, 46416), array(5, 1, 27, 21928), array(0, 2, 14, 19872), array(0, 2, 3, 42416), array(3, 1, 24, 21176), array(0, 2, 12, 21168),

        array(8, 1, 31, 43344), array(0, 2, 18, 59728), array(0, 2, 8, 27296), array(6, 1, 28, 44368), array(0, 2, 15, 43856), array(0, 2, 5, 19296),

        array(4, 1, 25, 42352), array(0, 2, 13, 42352), array(0, 2, 2, 21088), array(3, 1, 21, 59696), array(0, 2, 9, 55632), array(7, 1, 30, 23208),

        array(0, 2, 17, 22176), array(0, 2, 6, 38608), array(5, 1, 27, 19176), array(0, 2, 15, 19152), array(0, 2, 3, 42192), array(4, 1, 23, 53864),

        array(0, 2, 11, 53840), array(8, 1, 31, 54568), array(0, 2, 18, 46400), array(0, 2, 7, 46752), array(6, 1, 28, 38608), array(0, 2, 16, 38320),

        array(0, 2, 5, 18864), array(4, 1, 25, 42168), array(0, 2, 13, 42160), array(10, 2, 2, 45656), array(0, 2, 20, 27216), array(0, 2, 9, 27968),

        array(6, 1, 29, 44448), array(0, 2, 17, 43872), array(0, 2, 6, 38256), array(5, 1, 27, 18808), array(0, 2, 15, 18800), array(0, 2, 4, 25776),

        array(3, 1, 23, 27216), array(0, 2, 10, 59984), array(8, 1, 31, 27432), array(0, 2, 19, 23232), array(0, 2, 7, 43872), array(5, 1, 28, 37736),

        array(0, 2, 16, 37600), array(0, 2, 5, 51552), array(4, 1, 24, 54440), array(0, 2, 12, 54432), array(0, 2, 1, 55888), array(2, 1, 22, 23208),

        array(0, 2, 9, 22176), array(7, 1, 29, 43736), array(0, 2, 18, 9680), array(0, 2, 7, 37584), array(5, 1, 26, 51544), array(0, 2, 14, 43344),

        array(0, 2, 3, 46240), array(4, 1, 23, 46416), array(0, 2, 10, 44368), array(9, 1, 31, 21928), array(0, 2, 19, 19360), array(0, 2, 8, 42416),

        array(6, 1, 28, 21176), array(0, 2, 16, 21168), array(0, 2, 5, 43312), array(4, 1, 25, 29864), array(0, 2, 12, 27296), array(0, 2, 1, 44368),

        array(2, 1, 22, 19880), array(0, 2, 10, 19296), array(6, 1, 29, 42352), array(0, 2, 17, 42208), array(0, 2, 6, 53856), array(5, 1, 26, 59696),

        array(0, 2, 13, 54576), array(0, 2, 3, 23200), array(3, 1, 23, 27472), array(0, 2, 11, 38608), array(11, 1, 31, 19176), array(0, 2, 19, 19152),

        array(0, 2, 8, 42192), array(6, 1, 28, 53848), array(0, 2, 15, 53840), array(0, 2, 4, 54560), array(5, 1, 24, 55968), array(0, 2, 12, 46496),

        array(0, 2, 1, 22224), array(2, 1, 22, 19160), array(0, 2, 10, 18864), array(7, 1, 30, 42168), array(0, 2, 17, 42160), array(0, 2, 6, 43600),

        array(5, 1, 26, 46376), array(0, 2, 14, 27936), array(0, 2, 2, 44448), array(3, 1, 23, 21936), array(0, 2, 11, 37744), array(8, 2, 1, 18808),

        array(0, 2, 19, 18800), array(0, 2, 8, 25776), array(6, 1, 28, 27216), array(0, 2, 15, 59984), array(0, 2, 4, 27424), array(4, 1, 24, 43872),

        array(0, 2, 12, 43744), array(0, 2, 2, 37600), array(3, 1, 21, 51568), array(0, 2, 9, 51552), array(7, 1, 29, 54440), array(0, 2, 17, 54432),

        array(0, 2, 5, 55888), array(5, 1, 26, 23208), array(0, 2, 14, 22176), array(0, 2, 3, 42704), array(4, 1, 23, 21224), array(0, 2, 11, 21200),

        array(8, 1, 31, 43352), array(0, 2, 19, 43344), array(0, 2, 7, 46240), array(6, 1, 27, 46416), array(0, 2, 15, 44368), array(0, 2, 5, 21920),

        array(4, 1, 24, 42448), array(0, 2, 12, 42416), array(0, 2, 2, 21168), array(3, 1, 22, 43320), array(0, 2, 9, 26928), array(7, 1, 29, 29336),

        array(0, 2, 17, 27296), array(0, 2, 6, 44368), array(5, 1, 26, 19880), array(0, 2, 14, 19296), array(0, 2, 3, 42352), array(4, 1, 24, 21104),

        array(0, 2, 10, 53856), array(8, 1, 30, 59696), array(0, 2, 18, 54560), array(0, 2, 7, 55968), array(6, 1, 27, 27472), array(0, 2, 15, 22224),

        array(0, 2, 5, 19168), array(4, 1, 25, 42216), array(0, 2, 12, 42192), array(0, 2, 1, 53584), array(2, 1, 21, 55592), array(0, 2, 9, 54560)

    );

    /**
     * 将阳历转换为阴历
     * @param year 公历-年
     * @param month 公历-月
     * @param date 公历-日
     */

    public function convertSolarToLunar($year, $month, $date)
    {
        $yearData = $this->lunarInfo[$year - $this->MIN_YEAR];
        if ($year == $this->MIN_YEAR && $month <= 2 && $date <= 9) return array(1891, '正月', '初一', '辛卯', 1, 1, '兔');
        return $this->getLunarByBetween($year, $this->getDaysBetweenSolar($year, $month, $date, $yearData[1], $yearData[2]));
    }

    public function convertSolarMonthToLunar($year, $month, $date)

    {

        $yearData = $this->lunarInfo[$year - $this->MIN_YEAR];

        if ($year == $this->MIN_YEAR && $month <= 2 && $date <= 9) return array(1891, '正月', '初一', '辛卯', 1, 1, '兔');

        $month_days_ary = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

        $dd = $month_days_ary[$month];

        if ($this->isLeapYear($year) && $month == 2) $dd++;

        $lunar_ary = array();

        for ($i = 1; $i < $dd; $i++) {

            $array = $this->getLunarByBetween($year, $this->getDaysBetweenSolar($year, $month, $i, $yearData[1], $yearData[2]));

            $array[] = $year . '-' . $month . '-' . $i;

            $lunar_ary[$i] = $array;

        }

        return $lunar_ary;

    }

    /**
     * 将阴历转换为阳历
     * @param year 阴历-年
     * @param month 阴历-月，闰月处理：例如如果当年闰五月，那么第二个五月就传六月，相当于阴历有13个月，只是有的时候第13个月的天数为0
     * @param date 阴历-日
     */

    public function convertLunarToSolar($year, $month, $date)

    {

        $yearData = $this->lunarInfo[$year - $this->MIN_YEAR];

        $between = $this->getDaysBetweenLunar($year, $month, $date);

        $res = mktime(0, 0, 0, $yearData[1], $yearData[2], $year);

        $res = date('Y-m-d', $res + $between * 24 * 60 * 60);

        $day = explode('-', $res);

        $year = $day[0];

        $month = $day[1];

        $day = $day[2];

        return array($year, $month, $day);

    }

    /**
     * 判断是否是闰年
     * @param year
     */

    public function isLeapYear($year)

    {

        return (($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0));

    }

    /**
     * 获取干支纪年
     * @param year
     */

    public function getLunarYearName($year)
    {
        $sky = array('庚', '辛', '壬', '癸', '甲', '乙', '丙', '丁', '戊', '己');
        $earth = array('申', '酉', '戌', '亥', '子', '丑', '寅', '卯', '辰', '巳', '午', '未');
        $year = $year . '';
        return $sky[$year{3}] . $earth[$year % 12];

    }

    function offset2GanZhi($offset)
    {
        $sky = ["甲", "乙", "丙", "丁", "戊", "己", "庚", "辛", "壬", "癸"];

        $earth = ["子", "丑", "寅", "卯", "辰", "巳", "午", "未", "申", "酉", "戌", "亥"];
        return $sky[$offset % 10] . $earth[$offset % 12];
    }

    public function getMonthGZ($year, $month, $day)
    {
        //月柱 1900年1月小寒以前为 丙子月(60进制12)
        $firstNode = $this->getTerm($year - 1900, ($month * 2 - 1));//返回当月「节」为几日开始
        //依据12节气修正干支月
        $gzM = $this->offset2GanZhi(($year - 1900) * 12 + $month + 11);
        if ($day >= $firstNode) {
            $gzM = $this->offset2GanZhi(($year - 1900) * 12 + $month + 12);
        }
        return $gzM;
    }

    public function getDayGZ($year, $month, $day)
    {
        //日柱 当月一日与 1900/1/1 相差天数
        $dayCyclical = strtotime($year . '-' . ($month) . '-1 00:00:00') / 86400 + 25567 + 10;
        $gzD = $this->offset2GanZhi($dayCyclical + $day);
        return $gzD;
    }

    function getHourGZ($dayGZ, $hour)
    {
        // 天干五行
        $StemsTable = ["甲", "乙", "丙", "丁", "戊", "己", "庚", "辛", "壬", "癸"];
        $HourStemsTable = [
            ["甲", "乙", "丙", "丁", "戊", "己", "庚", "辛", "壬", "癸", "甲", "乙"],
            ["丙", "丁", "戊", "己", "庚", "辛", "壬", "癸", "甲", "乙", "丙", "丁"],
            ["戊", "己", "庚", "辛", "壬", "癸", "甲", "乙", "丙", "丁", "戊", "己"],
            ["庚", "辛", "壬", "癸", "甲", "乙", "丙", "丁", "戊", "己", "庚", "辛"],
            ["壬", "癸", "甲", "乙", "丙", "丁", "戊", "己", "庚", "辛", "壬", "癸"]];
        $HourBranchTable = ["子", "丑", "寅", "卯", "辰", "巳", "午", "未", "申", "酉", "戌", "亥"];
        $dIndex = mb_strpos(implode('', $StemsTable), mb_substr($dayGZ, 0, 1));
        $hIndex = (int)(((int)($hour) + 1) / 2) % 12;
        $gz1 = $HourStemsTable[$dIndex % 5][$hIndex];
        $hIndex = (int)(((int)($hour) + 1) / 2) % 12;
        $gz2 = $HourBranchTable[$hIndex];
        return $gz1 . $gz2;
    }

    public function getWuxingInfo($year, $month, $day, $hour)
    {
        //计算干支纪年
        $yearGz = $this->getLunarYearName($year);

        $monthGz = $this->getMonthGZ($year, $month, $day);
        $dayGz = $this->getDayGZ($year, $month, $day);
        $hourGz = $this->getHourGZ($dayGz, $hour);
        $bazi = [$yearGz, $monthGz, $dayGz, $hourGz];
        return $bazi;
    }

    public function getNayinByGZ($gz)
    {
        $nayinArr = [0 => '甲子 乙丑 海中金 ', 1 => '丙寅 丁卯 炉中火 ', 2 => '戊辰 己巳 大林木 ', 3 => '庚午 辛未 路旁土 ',
            4 => '壬申 癸酉 剑锋金 ', 5 => '甲戌 乙亥 山头火 ', 6 => '丙子 丁丑 漳下水 ', 7 => '戊寅 己卯 城头土 ',
            8 => '庚辰 辛巳 白腊金 ', 9 => '壬午 癸未 杨柳木 ', 10 => '甲申 乙酉 泉中水 ', 11 => '丙戌 丁亥 屋上土 ',
            12 => '戊子 己丑 霹雳火 ', 13 => '庚寅 辛卯 松柏木 ', 14 => '壬辰 癸巳 长流水 ', 15 => '甲午 乙未 砂石金 ',
            16 => '丙申 丁酉 山下火 ', 17 => '戊戌 己亥 平地木 ', 18 => '庚子 辛丑 壁上土 ', 19 => '壬寅 癸卯 金薄金 ',
            20 => '甲辰 乙巳 覆灯火 ', 21 => '丙午 丁未 天河水 ', 22 => '戊申 己酉 大驿土 ', 23 => '庚戌 辛亥 钗环金 ',
            24 => '壬子 癸丑 桑柘木 ', 25 => '甲寅 乙卯 大溪水 ', 26 => '丙辰 丁巳 沙中土 ', 27 => '戊午 己未 天上火 ',
            28 => '庚申 辛酉 石榴木 ', 29 => '壬戌 癸亥 大海水 ', 30 => ' ', 31 => ''];
        foreach ($nayinArr as $ar) {
            //echo $gz."|".$ar."<br>";
            if (strstr($ar, $gz)) {
                return mb_substr($ar, 6);
            }
        }
    }

    public function getNayinArrByYMDH($year, $month, $day, $hour)
    {
        $baziArr = $this->getWuxingInfo($year, $month, $day, $hour);
        $nayinArr = [];
        foreach ($baziArr as $bazi) {
            $nayinArr[] = $this->getNayinByGZ($bazi);
        }
        return $nayinArr;
    }

    public function getBaziWuxingByGZ($gz)
    {
        $arr = array_merge(TianGan::$tianganWuxingMap, DiZhi::$dizhiWuxingMap);
        return $arr[$gz];
    }

    public function getBaziWuxingByYMDH($year, $month, $day, $hour)
    {
        $baziArr = $this->getWuxingInfo($year, $month, $day, $hour);
        $wuxingArr = [];
        foreach ($baziArr as $bazi) {
            $wuxingArr[] = $this->getBaziWuxingByGZ(mb_substr($bazi, 0, 1)) . $this->getBaziWuxingByGZ(mb_substr($bazi, 1, 1));
        }
        return $wuxingArr;
    }

    public function getWuxingCountByYMDH($year, $month, $day, $hour)
    {
        //获取八字对应的五行
        $wuxingArr = $this->getBaziWuxingByYMDH($year, $month, $day, $hour);

        //统计五行的数量
        $wuxingCountArr = [
            'j' => 0, 'm' => 0, 's' => 0, 'h' => 0, 't' => 0
        ];
        foreach ($wuxingArr as $wuxing) {
            $wuxingCountArr[$this->getWxPinyinByChar(mb_substr($wuxing, 0, 1))]++;
            $wuxingCountArr[$this->getWxPinyinByChar(mb_substr($wuxing, 1, 1))]++;
        }
        return $wuxingCountArr;
    }

    public function getWuxingStrenthByYMDH($year, $month, $day, $hour)
    {
        $TianGanStrength = BaZi::$tianganScoreMap;
        $DiZhiStrength =
            [
                ['子', '癸', [1.2, 1.1, 1.0, 1.0, 1.04, 1.06, 1.0, 1.0, 1.2, 1.2, 1.06, 1.14]],
                ['丑', '癸', [0.36, 0.33, 0.3, 0.3, 0.312, 0.318, 0.3, 0.3, 0.36, 0.36, 0.318, 0.342]],
                ['丑', '辛', [0.2, 0.228, 0.2, 0.2, 0.23, 0.212, 0.2, 0.22, 0.228, 0.248, 0.232, 0.2]],
                ['丑', '己', [0.5, 0.55, 0.53, 0.5, 0.55, 0.57, 0.6, 0.58, 0.5, 0.5, 0.57, 0.5]],
                ['寅', '丙', [0.3, 0.3, 0.36, 0.36, 0.318, 0.342, 0.36, 0.33, 0.3, 0.3, 0.342, 0.318]],
                ['寅', '甲', [0.84, 0.742, 0.798, 0.84, 0.77, 0.7, 0.7, 0.728, 0.742, 0.7, 0.7, 0.84]],
                ['卯', '乙', [1.2, 1.06, 1.14, 1.2, 1.1, 1.0, 1.0, 1.04, 1.06, 1.0, 1.0, 1.2]],
                ['辰', '乙', [0.36, 0.318, 0.342, 0.36, 0.33, 0.3, 0.3, 0.312, 0.318, 0.3, 0.3, 0.36]],
                ['辰', '癸', [0.24, 0.22, 0.2, 0.2, 0.208, 0.2, 0.2, 0.2, 0.24, 0.24, 0.212, 0.228]],
                ['辰', '戊', [0.5, 0.55, 0.53, 0.5, 0.55, 0.6, 0.6, 0.58, 0.5, 0.5, 0.57, 0.5]],
                ['巳', '庚', [0.3, 0.342, 0.3, 0.3, 0.33, 0.3, 0.3, 0.33, 0.342, 0.36, 0.348, 0.3]],
                ['巳', '丙', [0.7, 0.7, 0.84, 0.84, 0.742, 0.84, 0.84, 0.798, 0.7, 0.7, 0.728, 0.742]],
                ['午', '丁', [1.0, 1.0, 1.2, 1.2, 1.06, 1.14, 1.2, 1.1, 1.0, 1.0, 1.04, 1.06]],
                ['未', '丁', [0.3, 0.3, 0.36, 0.36, 0.318, 0.342, 0.36, 0.33, 0.3, 0.3, 0.312, 0.318]],
                ['未', '乙', [0.24, 0.212, 0.228, 0.24, 0.22, 0.2, 0.2, 0.208, 0.212, 0.2, 0.2, 0.24]],
                ['未', '己', [0.5, 0.55, 0.53, 0.5, 0.55, 0.57, 0.6, 0.58, 0.5, 0.5, 0.57, 0.5]],
                ['申', '壬', [0.36, 0.33, 0.3, 0.3, 0.312, 0.318, 0.3, 0.3, 0.36, 0.36, 0.318, 0.342]],
                ['申', '庚', [0.7, 0.798, 0.7, 0.7, 0.77, 0.742, 0.7, 0.77, 0.798, 0.84, 0.812, 0.7]],
                ['酉', '辛', [1.0, 1.14, 1.0, 1.0, 1.1, 1.06, 1.0, 1.1, 1.14, 1.2, 1.16, 1.0]],
                ['戌', '辛', [0.3, 0.342, 0.3, 0.3, 0.33, 0.318, 0.3, 0.33, 0.342, 0.36, 0.348, 0.3]],
                ['戌', '丁', [0.2, 0.2, 0.24, 0.24, 0.212, 0.228, 0.24, 0.22, 0.2, 0.2, 0.208, 0.212]],
                ['戌', '戊', [0.5, 0.55, 0.53, 0.5, 0.55, 0.57, 0.6, 0.58, 0.5, 0.5, 0.57, 0.5]],
                ['亥', '甲', [0.36, 0.318, 0.342, 0.36, 0.33, 0.3, 0.3, 0.312, 0.318, 0.3, 0.3, 0.36]],
                ['亥', '壬', [0.84, 0.77, 0.7, 0.7, 0.728, 0.742, 0.7, 0.7, 0.84, 0.84, 0.724, 0.798]]
            ];

        //获取天干地址表
        $baziArr = $this->getWuxingInfo($year, $month, $day, $hour);
        //var_dump($baziArr);die;
        $wuxingStrenthArr = [
            'j' => 0, 'm' => 0, 's' => 0, 'h' => 0, 't' => 0
        ];
        $monthZhi = mb_substr($baziArr[1], 1, 1);
        //计算天干强度
        foreach ($baziArr as $bazi) {
            //计算天干强度
            $tg = mb_substr($bazi, 0, 1);
            $tgWuxing = $this->getBaziWuxingByGZ($tg);
            $tgWuxingPinyin = $this->getWxPinyinByChar($tgWuxing);
            $tgStrenth = $TianGanStrength[$monthZhi][$this->getGanCount($tg)];
            $wuxingStrenthArr[$tgWuxingPinyin] += $tgStrenth;
            //计算地支强度
            $dz = mb_substr($bazi, 1, 1);
            foreach ($DiZhiStrength as $dizhiArr) {
                if ($dizhiArr[0] == $dz) {
                    $tg2 = $dizhiArr[1];
                    $tg2Wuxing = $this->getBaziWuxingByGZ($tg2);
                    $tg2WuxingPinyin = $this->getWxPinyinByChar($tg2Wuxing);
                    $tg2Strenth = $dizhiArr[2][$this->getZhiCount($monthZhi)];
                    $wuxingStrenthArr[$tg2WuxingPinyin] += $tg2Strenth;
                }
            }
        }
        return $wuxingStrenthArr;
    }

    /**
     * 获取五行旺缺
     * 算法：如果有五行数量为0，按强弱判断，如果数量都不是0，就输出 八字五行平衡
     */
    public function getWuxingWangQueByYMDH($year, $month, $day, $hour)
    {
        $res = '';
        $wuxingCountList = $this->getWuxingCountByYMDH($year, $month, $day, $hour);
        $wuxingStrenthList = $this->getWuxingStrenthByYMDH($year, $month, $day, $hour);
        $hasZero = false;
        foreach ($wuxingCountList as $wuxingCount) {
            if ($wuxingCount == 0) {
                $hasZero = true;
                break;
            }
        }

        if ($hasZero) {
            $wang = [];
            $que = [];
            //按强度排序
            $maxStrenth = 0;
            $minStrenth = 100;
            arsort($wuxingStrenthList);
            foreach ($wuxingStrenthList as $key => $wuxingStrenth) {
                if ($wuxingStrenth >= $maxStrenth) {
                    $maxStrenth = $wuxingStrenth;
                    $wang[] = $this->getWxCharByPinyin($key);
                }
            }
            asort($wuxingStrenthList);
            foreach ($wuxingStrenthList as $key => $wuxingStrenth) {
                if ($wuxingStrenth <= $minStrenth) {
                    $minStrenth = $wuxingStrenth;
                    $que[] = $this->getWxCharByPinyin($key);
                }
            }
            $res = '五行' . implode('', $wang) . '旺缺' . implode('', $que);
            //$this->g
        } else {
            $res = '八字均衡';
        }
        return $res;
    }

    /**
     * 获取28星宿
     */
    public function get28XingXiuByYMD($year, $month, $day)
    {
        $lunarArr = $this->convertSolarToLunar($year, $month, $day);
        $map = [
            '初一' => ['室宿', '奎宿', '胃宿', '毕宿', '参宿', '鬼宿', '张宿', '角宿', '氐宿', '心宿', '斗宿', '虚宿'],
            '初二' => ['壁宿', '娄宿', '昴宿', '觜宿', '井宿', '柳宿', '翼宿', '亢宿', '房宿', '尾宿', '女宿', '危宿'],
            '初三' => ['奎宿', '胃宿', '毕宿', '参宿', '鬼宿', '星宿', '轸宿', '氐宿', '心宿', '箕宿', '虚宿', '室宿'],
            '初四' => ['娄宿', '昴宿', '觜宿', '井宿', '柳宿', '张宿', '角宿', '房宿', '尾宿', '斗宿', '危宿', '壁宿'],
            '初五' => ['胃宿', '毕宿', '参宿', '鬼宿', '星宿', '翼宿', '亢宿', '心宿', '箕宿', '女宿', '室宿', '奎宿'],
            '初六' => ['昴宿', '觜宿', '井宿', '柳宿', '张宿', '轸宿', '氐宿', '尾宿', '斗宿', '虚宿', '壁宿', '娄宿'],
            '初七' => ['毕宿', '参宿', '鬼宿', '星宿', '翼宿', '角宿', '房宿', '箕宿', '女宿', '危宿', '奎宿', '胃宿'],
            '初八' => ['觜宿', '井宿', '柳宿', '张宿', '轸宿', '亢宿', '心宿', '斗宿', '虚宿', '室宿', '娄宿', '昴宿'],
            '初九' => ['参宿', '鬼宿', '星宿', '翼宿', '角宿', '氐宿', '尾宿', '女宿', '危宿', '壁宿', '胃宿', '毕宿'],
            '初十' => ['井宿', '柳宿', '张宿', '轸宿', '亢宿', '房宿', '箕宿', '虚宿', '室宿', '奎宿', '昴宿', '觜宿'],
            '十一' => ['鬼宿', '星宿', '翼宿', '角宿', '氐宿', '心宿', '斗宿', '危宿', '壁宿', '娄宿', '毕宿', '参宿'],
            '十二' => ['柳宿', '张宿', '轸宿', '亢宿', '房宿', '尾宿', '女宿', '室宿', '奎宿', '胃宿', '觜宿', '井宿'],
            '十三' => ['星宿', '翼宿', '角宿', '氐宿', '心宿', '箕宿', '虚宿', '壁宿', '娄宿', '昴宿', '参宿', '鬼宿'],
            '十四' => ['张宿', '轸宿', '亢宿', '房宿', '尾宿', '斗宿', '危宿', '奎宿', '胃宿', '毕宿', '井宿', '柳宿'],
            '十五' => ['翼宿', '角宿', '氐宿', '心宿', '箕宿', '女宿', '室宿', '娄宿', '昴宿', '觜宿', '鬼宿', '星宿'],
            '十六' => ['轸宿', '亢宿', '房宿', '尾宿', '斗宿', '虚宿', '壁宿', '胃宿', '毕宿', '参宿', '柳宿', '张宿'],
            '十七' => ['角宿', '氐宿', '心宿', '箕宿', '女宿', '危宿', '奎宿', '昴宿', '觜宿', '井宿', '星宿', '翼宿'],
            '十八' => ['亢宿', '房宿', '尾宿', '斗宿', '虚宿', '室宿', '娄宿', '毕宿', '参宿', '鬼宿', '张宿', '轸宿'],
            '十九' => ['氐宿', '心宿', '箕宿', '女宿', '危宿', '壁宿', '胃宿', '觜宿', '井宿', '柳宿', '翼宿', '角宿'],
            '二十' => ['房宿', '尾宿', '斗宿', '虚宿', '室宿', '奎宿', '昴宿', '参宿', '鬼宿', '星宿', '轸宿', '亢宿'],
            '二十一' => ['心宿', '箕宿', '女宿', '危宿', '壁宿', '娄宿', '毕宿', '井宿', '柳宿', '张宿', '角宿', '氐宿'],
            '二十二' => ['尾宿', '斗宿', '虚宿', '室宿', '奎宿', '胃宿', '觜宿', '鬼宿', '星宿', '翼宿', '亢宿', '房宿'],
            '二十三' => ['箕宿', '女宿', '危宿', '壁宿', '娄宿', '昴宿', '参宿', '柳宿', '张宿', '轸宿', '氐宿', '心宿'],
            '二十四' => ['斗宿', '虚宿', '室宿', '奎宿', '胃宿', '毕宿', '井宿', '星宿', '翼宿', '角宿', '房宿', '尾宿'],
            '二十五' => ['女宿', '危宿', '壁宿', '娄宿', '昴宿', '觜宿', '鬼宿', '张宿', '轸宿', '亢宿', '心宿', '箕宿'],
            '二十六' => ['虚宿', '室宿', '奎宿', '胃宿', '毕宿', '参宿', '柳宿', '翼宿', '角宿', '氐宿', '尾宿', '斗宿'],
            '二十七' => ['危宿', '壁宿', '娄宿', '昴宿', '觜宿', '井宿', '星宿', '轸宿', '亢宿', '房宿', '箕宿', '女宿'],
            '二十八' => ['室宿', '奎宿', '胃宿', '毕宿', '参宿', '鬼宿', '张宿', '角宿', '氐宿', '心宿', '斗宿', '虚宿'],
            '二十九' => ['壁宿', '娄宿', '昴宿', '觜宿', '井宿', '柳宿', '翼宿', '亢宿', '房宿', '尾宿', '女宿', '危宿'],
            '三十' => ['奎宿', '胃宿', '毕宿', '参宿', '鬼宿', '星宿', '轸宿', '氐宿', '心宿', '箕宿', '虚宿', '室宿'],
            '廿' => ['房宿', '尾宿', '斗宿', '虚宿', '室宿', '奎宿', '昴宿', '参宿', '鬼宿', '星宿', '轸宿', '亢宿'],
            '廿一' => ['心宿', '箕宿', '女宿', '危宿', '壁宿', '娄宿', '毕宿', '井宿', '柳宿', '张宿', '角宿', '氐宿'],
            '廿二' => ['尾宿', '斗宿', '虚宿', '室宿', '奎宿', '胃宿', '觜宿', '鬼宿', '星宿', '翼宿', '亢宿', '房宿'],
            '廿三' => ['箕宿', '女宿', '危宿', '壁宿', '娄宿', '昴宿', '参宿', '柳宿', '张宿', '轸宿', '氐宿', '心宿'],
            '廿四' => ['斗宿', '虚宿', '室宿', '奎宿', '胃宿', '毕宿', '井宿', '星宿', '翼宿', '角宿', '房宿', '尾宿'],
            '廿五' => ['女宿', '危宿', '壁宿', '娄宿', '昴宿', '觜宿', '鬼宿', '张宿', '轸宿', '亢宿', '心宿', '箕宿'],
            '廿六' => ['虚宿', '室宿', '奎宿', '胃宿', '毕宿', '参宿', '柳宿', '翼宿', '角宿', '氐宿', '尾宿', '斗宿'],
            '廿七' => ['危宿', '壁宿', '娄宿', '昴宿', '觜宿', '井宿', '星宿', '轸宿', '亢宿', '房宿', '箕宿', '女宿'],
            '廿八' => ['室宿', '奎宿', '胃宿', '毕宿', '参宿', '鬼宿', '张宿', '角宿', '氐宿', '心宿', '斗宿', '虚宿'],
            '廿九' => ['壁宿', '娄宿', '昴宿', '觜宿', '井宿', '柳宿', '翼宿', '亢宿', '房宿', '尾宿', '女宿', '危宿'],
        ];
        $xingXiu = $map[$lunarArr[2]][$lunarArr[4] - 1] ?? '';
        return $xingXiu;
    }


    /**
     * 获取生肖
     * @param unknown $year
     * @param unknown $month
     * @param unknown $day
     * @param unknown $hour
     */
    public function getSXByYMDH($year, $month, $day, $hour)
    {
        $sxArr = DiZhi::$shengxiao;
        $wuxingInfo = $this->getWuxingInfo($year, $month, $day, $hour);
        $resArr = [];
        foreach ($wuxingInfo as $wuxing) {
            $dz = mb_substr($wuxing, 1, 1);
            $resArr[] = $sxArr[$dz];
        }
        return $resArr;
    }

    /**
     * 获取生肖的颜色
     * @param unknown $year
     * @param unknown $month
     * @param unknown $day
     * @param unknown $hour
     */
    public function getSXColorByYMDH($year, $month, $day, $hour)
    {
        $colorArr = WuXing::$color;
        $wuxingInfo = $this->getWuxingInfo($year, $month, $day, $hour);
        $resArr = [];
        foreach ($wuxingInfo as $wuxing) {
            $tg = mb_substr($wuxing, 0, 1);
            $dzWx = $this->getBaziWuxingByGZ($tg);
            $resArr[] = $colorArr[$dzWx];
        }
        return $resArr;
    }

    public function getYinYangByYMDH($year, $month, $day, $hour)
    {
        $yinYangMap = array_merge(TianGan::$yinyang, DiZhi::$yinyang);
        $wuxingInfo = $this->getWuxingInfo($year, $month, $day, $hour);
        $resArr = [];
        foreach ($wuxingInfo as $wuxing) {
            $tg = mb_substr($wuxing, 0, 1);
            $resArr[] = $yinYangMap[$tg];
        }
        return $resArr;
    }

    public function getGanCount($gan)
    {
        $ganArr = TianGan::$tianganArr;
        foreach ($ganArr as $key => $ganItem) {
            if ($ganItem == $gan) {
                return $key;
            }
        }
    }

    public function getZhiCount($zhi)
    {
        $zhiArr = DiZhi::$dizhiArr;
        foreach ($zhiArr as $key => $zhiItem) {
            if ($zhiItem == $zhi) {
                return $key;
            }
        }
    }

    public function getWxPinyinByChar($char)
    {
        $pinyin = '';
        switch ($char) {
            case '金' :
                $pinyin = 'j';
                break;
            case '木' :
                $pinyin = 'm';
                break;
            case '水' :
                $pinyin = 's';
                break;
            case '火' :
                $pinyin = 'h';
                break;
            case '土' :
                $pinyin = 't';
                break;
        }
        return $pinyin;
    }

    public function getWxCharByPinyin($pinyin)
    {
        $char = '';
        switch ($pinyin) {
            case 'j' :
                $char = '金';
                break;
            case 'm' :
                $char = '木';
                break;
            case 's' :
                $char = '水';
                break;
            case 'h' :
                $char = '火';
                break;
            case 't' :
                $char = '土';
                break;
        }
        return $char;
    }

    /**
     * 传入公历(!)y年获得该年第n个节气的公历日期
     * @param y公历年(1900-2100)；n二十四节气中的第几个节气(1~24)；从n=1(小寒)算起
     * @return day Number
     * @eg:var _24 = calendar.getTerm(1987,3) ;//_24=4;意即1987年2月4日立春
     */
    function getTerm($y, $n)
    {
        if ($y < 1900 || $y > 2100) {
            return false;
        }
        if ($n < 1 || $n > 24) {
            return -1;
        }
        /**
         * 1900-2100各年的24节气日期速查表
         * @Array Of Property
         * @return 0x string For splice
         */
        $sTermInfo = ['9778397bd097c36b0b6fc9274c91aa', '97b6b97bd19801ec9210c965cc920e', '97bcf97c3598082c95f8c965cc920f',
            '97bd0b06bdb0722c965ce1cfcc920f', 'b027097bd097c36b0b6fc9274c91aa', '97b6b97bd19801ec9210c965cc920e',
            '97bcf97c359801ec95f8c965cc920f', '97bd0b06bdb0722c965ce1cfcc920f', 'b027097bd097c36b0b6fc9274c91aa',
            '97b6b97bd19801ec9210c965cc920e', '97bcf97c359801ec95f8c965cc920f', '97bd0b06bdb0722c965ce1cfcc920f',
            'b027097bd097c36b0b6fc9274c91aa', '9778397bd19801ec9210c965cc920e', '97b6b97bd19801ec95f8c965cc920f',
            '97bd09801d98082c95f8e1cfcc920f', '97bd097bd097c36b0b6fc9210c8dc2', '9778397bd197c36c9210c9274c91aa',
            '97b6b97bd19801ec95f8c965cc920e', '97bd09801d98082c95f8e1cfcc920f', '97bd097bd097c36b0b6fc9210c8dc2',
            '9778397bd097c36c9210c9274c91aa', '97b6b97bd19801ec95f8c965cc920e', '97bcf97c3598082c95f8e1cfcc920f',
            '97bd097bd097c36b0b6fc9210c8dc2', '9778397bd097c36c9210c9274c91aa', '97b6b97bd19801ec9210c965cc920e',
            '97bcf97c3598082c95f8c965cc920f', '97bd097bd097c35b0b6fc920fb0722', '9778397bd097c36b0b6fc9274c91aa',
            '97b6b97bd19801ec9210c965cc920e', '97bcf97c3598082c95f8c965cc920f', '97bd097bd097c35b0b6fc920fb0722',
            '9778397bd097c36b0b6fc9274c91aa', '97b6b97bd19801ec9210c965cc920e', '97bcf97c359801ec95f8c965cc920f',
            '97bd097bd097c35b0b6fc920fb0722', '9778397bd097c36b0b6fc9274c91aa', '97b6b97bd19801ec9210c965cc920e',
            '97bcf97c359801ec95f8c965cc920f', '97bd097bd097c35b0b6fc920fb0722', '9778397bd097c36b0b6fc9274c91aa',
            '97b6b97bd19801ec9210c965cc920e', '97bcf97c359801ec95f8c965cc920f', '97bd097bd07f595b0b6fc920fb0722',
            '9778397bd097c36b0b6fc9210c8dc2', '9778397bd19801ec9210c9274c920e', '97b6b97bd19801ec95f8c965cc920f',
            '97bd07f5307f595b0b0bc920fb0722', '7f0e397bd097c36b0b6fc9210c8dc2', '9778397bd097c36c9210c9274c920e',
            '97b6b97bd19801ec95f8c965cc920f', '97bd07f5307f595b0b0bc920fb0722', '7f0e397bd097c36b0b6fc9210c8dc2',
            '9778397bd097c36c9210c9274c91aa', '97b6b97bd19801ec9210c965cc920e', '97bd07f1487f595b0b0bc920fb0722',
            '7f0e397bd097c36b0b6fc9210c8dc2', '9778397bd097c36b0b6fc9274c91aa', '97b6b97bd19801ec9210c965cc920e',
            '97bcf7f1487f595b0b0bb0b6fb0722', '7f0e397bd097c35b0b6fc920fb0722', '9778397bd097c36b0b6fc9274c91aa',
            '97b6b97bd19801ec9210c965cc920e', '97bcf7f1487f595b0b0bb0b6fb0722', '7f0e397bd097c35b0b6fc920fb0722',
            '9778397bd097c36b0b6fc9274c91aa', '97b6b97bd19801ec9210c965cc920e', '97bcf7f1487f531b0b0bb0b6fb0722',
            '7f0e397bd097c35b0b6fc920fb0722', '9778397bd097c36b0b6fc9274c91aa', '97b6b97bd19801ec9210c965cc920e',
            '97bcf7f1487f531b0b0bb0b6fb0722', '7f0e397bd07f595b0b6fc920fb0722', '9778397bd097c36b0b6fc9274c91aa',
            '97b6b97bd19801ec9210c9274c920e', '97bcf7f0e47f531b0b0bb0b6fb0722', '7f0e397bd07f595b0b0bc920fb0722',
            '9778397bd097c36b0b6fc9210c91aa', '97b6b97bd197c36c9210c9274c920e', '97bcf7f0e47f531b0b0bb0b6fb0722',
            '7f0e397bd07f595b0b0bc920fb0722', '9778397bd097c36b0b6fc9210c8dc2', '9778397bd097c36c9210c9274c920e',
            '97b6b7f0e47f531b0723b0b6fb0722', '7f0e37f5307f595b0b0bc920fb0722', '7f0e397bd097c36b0b6fc9210c8dc2',
            '9778397bd097c36b0b70c9274c91aa', '97b6b7f0e47f531b0723b0b6fb0721', '7f0e37f1487f595b0b0bb0b6fb0722',
            '7f0e397bd097c35b0b6fc9210c8dc2', '9778397bd097c36b0b6fc9274c91aa', '97b6b7f0e47f531b0723b0b6fb0721',
            '7f0e27f1487f595b0b0bb0b6fb0722', '7f0e397bd097c35b0b6fc920fb0722', '9778397bd097c36b0b6fc9274c91aa',
            '97b6b7f0e47f531b0723b0b6fb0721', '7f0e27f1487f531b0b0bb0b6fb0722', '7f0e397bd097c35b0b6fc920fb0722',
            '9778397bd097c36b0b6fc9274c91aa', '97b6b7f0e47f531b0723b0b6fb0721', '7f0e27f1487f531b0b0bb0b6fb0722',
            '7f0e397bd097c35b0b6fc920fb0722', '9778397bd097c36b0b6fc9274c91aa', '97b6b7f0e47f531b0723b0b6fb0721',
            '7f0e27f1487f531b0b0bb0b6fb0722', '7f0e397bd07f595b0b0bc920fb0722', '9778397bd097c36b0b6fc9274c91aa',
            '97b6b7f0e47f531b0723b0787b0721', '7f0e27f0e47f531b0b0bb0b6fb0722', '7f0e397bd07f595b0b0bc920fb0722',
            '9778397bd097c36b0b6fc9210c91aa', '97b6b7f0e47f149b0723b0787b0721', '7f0e27f0e47f531b0723b0b6fb0722',
            '7f0e397bd07f595b0b0bc920fb0722', '9778397bd097c36b0b6fc9210c8dc2', '977837f0e37f149b0723b0787b0721',
            '7f07e7f0e47f531b0723b0b6fb0722', '7f0e37f5307f595b0b0bc920fb0722', '7f0e397bd097c35b0b6fc9210c8dc2',
            '977837f0e37f14998082b0787b0721', '7f07e7f0e47f531b0723b0b6fb0721', '7f0e37f1487f595b0b0bb0b6fb0722',
            '7f0e397bd097c35b0b6fc9210c8dc2', '977837f0e37f14998082b0787b06bd', '7f07e7f0e47f531b0723b0b6fb0721',
            '7f0e27f1487f531b0b0bb0b6fb0722', '7f0e397bd097c35b0b6fc920fb0722', '977837f0e37f14998082b0787b06bd',
            '7f07e7f0e47f531b0723b0b6fb0721', '7f0e27f1487f531b0b0bb0b6fb0722', '7f0e397bd097c35b0b6fc920fb0722',
            '977837f0e37f14998082b0787b06bd', '7f07e7f0e47f531b0723b0b6fb0721', '7f0e27f1487f531b0b0bb0b6fb0722',
            '7f0e397bd07f595b0b0bc920fb0722', '977837f0e37f14998082b0787b06bd', '7f07e7f0e47f531b0723b0b6fb0721',
            '7f0e27f1487f531b0b0bb0b6fb0722', '7f0e397bd07f595b0b0bc920fb0722', '977837f0e37f14998082b0787b06bd',
            '7f07e7f0e47f149b0723b0787b0721', '7f0e27f0e47f531b0b0bb0b6fb0722', '7f0e397bd07f595b0b0bc920fb0722',
            '977837f0e37f14998082b0723b06bd', '7f07e7f0e37f149b0723b0787b0721', '7f0e27f0e47f531b0723b0b6fb0722',
            '7f0e397bd07f595b0b0bc920fb0722', '977837f0e37f14898082b0723b02d5', '7ec967f0e37f14998082b0787b0721',
            '7f07e7f0e47f531b0723b0b6fb0722', '7f0e37f1487f595b0b0bb0b6fb0722', '7f0e37f0e37f14898082b0723b02d5',
            '7ec967f0e37f14998082b0787b0721', '7f07e7f0e47f531b0723b0b6fb0722', '7f0e37f1487f531b0b0bb0b6fb0722',
            '7f0e37f0e37f14898082b0723b02d5', '7ec967f0e37f14998082b0787b06bd', '7f07e7f0e47f531b0723b0b6fb0721',
            '7f0e37f1487f531b0b0bb0b6fb0722', '7f0e37f0e37f14898082b072297c35', '7ec967f0e37f14998082b0787b06bd',
            '7f07e7f0e47f531b0723b0b6fb0721', '7f0e27f1487f531b0b0bb0b6fb0722', '7f0e37f0e37f14898082b072297c35',
            '7ec967f0e37f14998082b0787b06bd', '7f07e7f0e47f531b0723b0b6fb0721', '7f0e27f1487f531b0b0bb0b6fb0722',
            '7f0e37f0e366aa89801eb072297c35', '7ec967f0e37f14998082b0787b06bd', '7f07e7f0e47f149b0723b0787b0721',
            '7f0e27f1487f531b0b0bb0b6fb0722', '7f0e37f0e366aa89801eb072297c35', '7ec967f0e37f14998082b0723b06bd',
            '7f07e7f0e47f149b0723b0787b0721', '7f0e27f0e47f531b0723b0b6fb0722', '7f0e37f0e366aa89801eb072297c35',
            '7ec967f0e37f14998082b0723b06bd', '7f07e7f0e37f14998083b0787b0721', '7f0e27f0e47f531b0723b0b6fb0722',
            '7f0e37f0e366aa89801eb072297c35', '7ec967f0e37f14898082b0723b02d5', '7f07e7f0e37f14998082b0787b0721',
            '7f07e7f0e47f531b0723b0b6fb0722', '7f0e36665b66aa89801e9808297c35', '665f67f0e37f14898082b0723b02d5',
            '7ec967f0e37f14998082b0787b0721', '7f07e7f0e47f531b0723b0b6fb0722', '7f0e36665b66a449801e9808297c35',
            '665f67f0e37f14898082b0723b02d5', '7ec967f0e37f14998082b0787b06bd', '7f07e7f0e47f531b0723b0b6fb0721',
            '7f0e36665b66a449801e9808297c35', '665f67f0e37f14898082b072297c35', '7ec967f0e37f14998082b0787b06bd',
            '7f07e7f0e47f531b0723b0b6fb0721', '7f0e26665b66a449801e9808297c35', '665f67f0e37f1489801eb072297c35',
            '7ec967f0e37f14998082b0787b06bd', '7f07e7f0e47f531b0723b0b6fb0721', '7f0e27f1487f531b0b0bb0b6fb0722'];
        $_table = $sTermInfo[$y - 1900];
        $info = [
            hexdec('0x' . substr($_table, 0, 5)),
            hexdec('0x' . substr($_table, 5, 5)),
            hexdec('0x' . substr($_table, 10, 5)),
            hexdec('0x' . substr($_table, 15, 5)),
            hexdec('0x' . substr($_table, 20, 5)),
            hexdec('0x' . substr($_table, 25, 5))
        ];
        $_calday = [
            substr($info[0], 0, 1),
            substr($info[0], 1, 2),
            substr($info[0], 3, 1),
            substr($info[0], 4, 2),

            substr($info[1], 0, 1),
            substr($info[1], 1, 2),
            substr($info[1], 3, 1),
            substr($info[1], 4, 2),

            substr($info[2], 0, 1),
            substr($info[2], 1, 2),
            substr($info[2], 3, 1),
            substr($info[2], 4, 2),

            substr($info[3], 0, 1),
            substr($info[3], 1, 2),
            substr($info[3], 3, 1),
            substr($info[3], 4, 2),

            substr($info[4], 0, 1),
            substr($info[4], 1, 2),
            substr($info[4], 3, 1),
            substr($info[4], 4, 2),

            substr($info[5], 0, 1),
            substr($info[5], 1, 2),
            substr($info[5], 3, 1),
            substr($info[5], 4, 2),
        ];
        return (int)($_calday[$n - 1]);
    }

    /**
     * 根据阴历年获取生肖
     * @param year 阴历年
     */

    public function getYearZodiac($year)

    {

        $zodiac = array('猴', '鸡', '狗', '猪', '鼠', '牛', '虎', '兔', '龙', '蛇', '马', '羊');

        return $zodiac[$year % 12];

    }

    /**
     * 获取阳历月份的天数
     * @param year 阳历-年
     * @param month 阳历-月
     */

    public function getSolarMonthDays($year, $month)

    {

        $monthHash = array('1' => 31, '2' => $this->isLeapYear($year) ? 29 : 28, '3' => 31, '4' => 30, '5' => 31, '6' => 30, '7' => 31, '8' => 31, '9' => 30, '10' => 31, '11' => 30, '12' => 31);

        return $monthHash["$month"];

    }

    /**
     * 获取阴历月份的天数
     * @param year 阴历-年
     * @param month 阴历-月，从一月开始
     */

    public function getLunarMonthDays($year, $month)

    {

        $monthData = $this->getLunarMonths($year);

        return $monthData[$month - 1];

    }

    /**
     * 获取阴历每月的天数的数组
     * @param year
     */

    public function getLunarMonths($year)

    {

        $yearData = $this->lunarInfo[$year - $this->MIN_YEAR];

        $leapMonth = $yearData[0];

        $bit = decbin($yearData[3]);

        for ($i = 0; $i < strlen($bit); $i++) $bitArray[$i] = substr($bit, $i, 1);

        for ($k = 0, $klen = 16 - count($bitArray); $k < $klen; $k++) array_unshift($bitArray, '0');

        $bitArray = array_slice($bitArray, 0, ($leapMonth == 0 ? 12 : 13));

        for ($i = 0; $i < count($bitArray); $i++) $bitArray[$i] = $bitArray[$i] + 29;

        return $bitArray;

    }

    /**
     * 获取农历每年的天数
     * @param year 农历年份
     */

    public function getLunarYearDays($year)

    {

        $yearData = $this->lunarInfo[$year - $this->MIN_YEAR];

        $monthArray = $this->getLunarYearMonths($year);

        $len = count($monthArray);

        return ($monthArray[$len - 1] == 0 ? $monthArray[$len - 2] : $monthArray[$len - 1]);

    }

    public function getLunarYearMonths($year)

    {

        $monthData = $this->getLunarMonths($year);

        $res = array();

        $temp = 0;

        $yearData = $this->lunarInfo[$year - $this->MIN_YEAR];

        $len = ($yearData[0] == 0 ? 12 : 13);

        for ($i = 0; $i < $len; $i++) {

            $temp = 0;

            for ($j = 0; $j <= $i; $j++) $temp += $monthData[$j];

            array_push($res, $temp);

        }

        return $res;

    }

    /**
     * 获取闰月
     * @param year 阴历年份
     */

    public function getLeapMonth($year)

    {

        $yearData = $this->lunarInfo[$year - $this->MIN_YEAR];

        return $yearData[0];

    }

    /**
     * 计算阴历日期与正月初一相隔的天数
     * @param year
     * @param month
     * @param date
     */

    public function getDaysBetweenLunar($year, $month, $date)

    {

        $yearMonth = $this->getLunarMonths($year);

        $res = 0;

        for ($i = 1; $i < $month; $i++) $res += $yearMonth[$i - 1];

        $res += $date - 1;

        return $res;

    }

    /**
     * 计算2个阳历日期之间的天数
     * @param year 阳历年
     * @param cmonth
     * @param cdate
     * @param dmonth 阴历正月对应的阳历月份
     * @param ddate 阴历初一对应的阳历天数
     */

    public function getDaysBetweenSolar($year, $cmonth, $cdate, $dmonth, $ddate)

    {

        $a = mktime(0, 0, 0, $cmonth, $cdate, $year);

        $b = mktime(0, 0, 0, $dmonth, $ddate, $year);

        return ceil(($a - $b) / 24 / 3600);

    }

    /**
     * 根据距离正月初一的天数计算阴历日期
     * @param year 阳历年
     * @param between 天数
     */

    public function getLunarByBetween($year, $between)

    {

        $lunarArray = array();

        $yearMonth = array();

        $t = 0;

        $e = 0;

        $leapMonth = 0;

        $m = '';

        if ($between == 0) {

            array_push($lunarArray, $year, '正月', '初一');

            $t = 1;

            $e = 1;

        } else {

            $year = $between > 0 ? $year : ($year - 1);

            $yearMonth = $this->getLunarYearMonths($year);

            $leapMonth = $this->getLeapMonth($year);

            $between = $between > 0 ? $between : ($this->getLunarYearDays($year) + $between);

            for ($i = 0; $i < 13; $i++) {

                if ($between == $yearMonth[$i]) {

                    $t = $i + 2;

                    $e = 1;

                    break;

                } else if ($between < $yearMonth[$i]) {

                    $t = $i + 1;

                    $e = $between - (empty($yearMonth[$i - 1]) ? 0 : $yearMonth[$i - 1]) + 1;

                    break;

                }

            }

            $m = ($leapMonth != 0 && $t == $leapMonth + 1) ? ('闰' . $this->getCapitalNum($t - 1, true)) : $this->getCapitalNum(($leapMonth != 0 && $leapMonth + 1 < $t ? ($t - 1) : $t), true);

            array_push($lunarArray, $year, $m, $this->getCapitalNum($e, false));

        }

        array_push($lunarArray, $this->getLunarYearName($year));// 天干地支

        array_push($lunarArray, $t, $e);

        array_push($lunarArray, $this->getYearZodiac($year));// 12生肖

        array_push($lunarArray, $leapMonth);// 闰几月

        return $lunarArray;

    }

    /**
     * 获取数字的阴历叫法
     * @param num 数字
     * @param isMonth 是否是月份的数字
     */

    public function getCapitalNum($num, $isMonth)

    {

        $isMonth = $isMonth || false;

        $dateHash = array('0' => '', '1' => '一', '2' => '二', '3' => '三', '4' => '四', '5' => '五', '6' => '六', '7' => '七', '8' => '八', '9' => '九', '10' => '十 ');

        $monthHash = array('0' => '', '1' => '正月', '2' => '二月', '3' => '三月', '4' => '四月', '5' => '五月', '6' => '六月', '7' => '七月', '8' => '八月', '9' => '九月', '10' => '十月', '11' => '冬月', '12' => '腊月');

        $res = '';

        if ($isMonth) $res = $monthHash[$num];

        else {

            if ($num <= 10) $res = '初' . $dateHash[$num];

            else if ($num > 10 && $num < 20) $res = '十' . $dateHash[$num - 10];

            else if ($num == 20) $res = "二十";

            else if ($num > 20 && $num < 30) $res = "廿" . $dateHash[$num - 20];

            else if ($num == 30) $res = "三十";

        }

        return $res;

    }

    /**
     * 节气通用算法
     */

    public function getJieQi($_year, $month, $day)

    {

        $year = substr($_year, -2) + 0;
        $coefficient = array(

            array(5.4055, 2019, -1),//小寒

            array(20.12, 2082, 1),//大寒

            array(3.87),//立春

            array(18.74, 2026, -1),//雨水

            array(5.63),//惊蛰

            array(20.646, 2084, 1),//春分

            array(4.81),//清明

            array(20.1),//谷雨

            array(5.52, 1911, 1),//立夏

            array(21.04, 2008, 1),//小满

            array(5.678, 1902, 1),//芒种

            array(21.37, 1928, 1),//夏至

            array(7.108, 2016, 1),//小暑

            array(22.83, 1922, 1),//大暑

            array(7.5, 2002, 1),//立秋

            array(23.13),//处暑

            array(7.646, 1927, 1),//白露

            array(23.042, 1942, 1),//秋分

            array(8.318),//寒露

            array(23.438, 2089, 1),//霜降

            array(7.438, 2089, 1),//立冬

            array(22.36, 1978, 1),//小雪

            array(7.18, 1954, 1),//大雪

            array(21.94, 2021, -1)//冬至

        );

        $term_name = array(

            "小寒", "大寒", "立春", "雨水", "惊蛰", "春分", "清明", "谷雨",

            "立夏", "小满", "芒种", "夏至", "小暑", "大暑", "立秋", "处暑",

            "白露", "秋分", "寒露", "霜降", "立冬", "小雪", "大雪", "冬至");

        $idx1 = ($month - 1) * 2;

        $_leap_value = floor(($year - 1) / 4);

        $day1 = floor($year * 0.2422 + $coefficient[$idx1][0]) - $_leap_value;

        if (isset($coefficient[$idx1][1]) && $coefficient[$idx1][1] == $_year) $day1 += $coefficient[$idx1][2];

        $day2 = floor($year * 0.2422 + $coefficient[$idx1 + 1][0]) - $_leap_value;

        if (isset($coefficient[$idx1 + 1][1]) && $coefficient[$idx1 + 1][1] == $_year) $day1 += $coefficient[$idx1 + 1][2];

        if ($day == $day1) return $term_name[$idx1];

        if ($day == $day2) return $term_name[$idx1 + 1];
        return '';

    }

    public function getBetweenJieQi($_year, $month, $day)
    {
        $year = substr($_year, -2) + 0;
        $coefficient = array(

            array(5.4055, 2019, -1),//小寒

            array(20.12, 2082, 1),//大寒

            array(3.87),//立春

            array(18.74, 2026, -1),//雨水

            array(5.63),//惊蛰

            array(20.646, 2084, 1),//春分

            array(4.81),//清明

            array(20.1),//谷雨

            array(5.52, 1911, 1),//立夏

            array(21.04, 2008, 1),//小满

            array(5.678, 1902, 1),//芒种

            array(21.37, 1928, 1),//夏至

            array(7.108, 2016, 1),//小暑

            array(22.83, 1922, 1),//大暑

            array(7.5, 2002, 1),//立秋

            array(23.13),//处暑

            array(7.646, 1927, 1),//白露

            array(23.042, 1942, 1),//秋分

            array(8.318),//寒露

            array(23.438, 2089, 1),//霜降

            array(7.438, 2089, 1),//立冬

            array(22.36, 1978, 1),//小雪

            array(7.18, 1954, 1),//大雪

            array(21.94, 2021, -1)//冬至

        );

        $term_name = array(

            "小寒", "大寒", "立春", "雨水", "惊蛰", "春分", "清明", "谷雨",

            "立夏", "小满", "芒种", "夏至", "小暑", "大暑", "立秋", "处暑",

            "白露", "秋分", "寒露", "霜降", "立冬", "小雪", "大雪", "冬至");

        $idx1 = ($month - 1) * 2;

        $_leap_value = floor(($year - 1) / 4);

        $day1 = floor($year * 0.2422 + $coefficient[$idx1][0]) - $_leap_value;

        if (isset($coefficient[$idx1][1]) && $coefficient[$idx1][1] == $_year) $day1 += $coefficient[$idx1][2];

        $day2 = floor($year * 0.2422 + $coefficient[$idx1 + 1][0]) - $_leap_value;

        if (isset($coefficient[$idx1 + 1][1]) && $coefficient[$idx1 + 1][1] == $_year) $day1 += $coefficient[$idx1 + 1][2];

        /*if($day==$day1) return $term_name[$idx1];

      if($day==$day2) return $term_name[$idx1+1];*/
        if ($day >= $day1 && $day < $day2) {
            return [$term_name[$idx1], $term_name[($idx1 + 1) % 24]];
        } elseif ($day >= $day2) {
            return [$term_name[($idx1 + 1) % 24], $term_name[($idx1 + 2) % 24]];
        } else {
            return [$term_name[($idx1 - 1) % 23], $term_name[$idx1]];
        }

    }

    /**
     * 根据生肖获取本命佛
     */
    public function getBenmingBuddhaBySX($sx)
    {
        $map = ShengXiao::$benmingfo;
        $benmingBuddha = $map[$sx] ?? '';
        return $benmingBuddha;
    }

    /**
     * 获取节日：特殊的节日只能修改此函数来计算
     */

    public function getFestival($today, $nl_info = false, $config = 1)

    {

        if ($config == 1) {

            $arr_lunar = array('01-01' => '春节', '01-15' => '元宵节', '02-02' => '二月二', '05-05' => '端午节', '07-07' => '七夕节', '08-15' => '中秋节', '09-09' => '重阳节', '12-08' => '腊八节', '12-23' => '小年');

            $arr_solar = array('01-01' => '元旦', '02-14' => '情人节', '03-12' => '植树节', '04-01' => '愚人节', '05-01' => '劳动节', '06-01' => '儿童节', '10-01' => '国庆节', '10-31' => '万圣节', '12-24' => '平安夜', '12-25' => '圣诞节');

        }//需要不同节日的，用不同的$config,然后配置$arr_lunar和$arr_solar

        $festivals = array();

        list($y, $m, $d) = explode('-', $today);

        if (!$nl_info) $nl_info = $this->convertSolarToLunar($y, intval($m), intval($d));

        if ($nl_info[7] > 0 && $nl_info[7] < $nl_info[4]) $nl_info[4] -= 1;

        $md_lunar = substr('0' . $nl_info[4], -2) . '-' . substr('0' . $nl_info[5], -2);

        $md_solar = substr_replace($today, '', 0, 5);

        isset($arr_lunar[$md_lunar]) ? array_push($festivals, $arr_lunar[$md_lunar]) : '';

        isset($arr_solar[$md_solar]) ? array_push($festivals, $arr_solar[$md_solar]) : '';

        $glweek = date("w", strtotime($today));  //0-6

        if ($m == 5 && ($d > 7) && ($d < 15) && ($glweek == 0)) array_push($festivals, "母亲节");

        if ($m == 6 && ($d > 14) && ($d < 22) && ($glweek == 0)) array_push($festivals, "父亲节");

        $jieqi = $this->getJieQi($y, $m, $d);

        if ($jieqi) array_push($festivals, $jieqi);

        return implode('/', $festivals);

    }

    /**
     * 获取太阳真时
     * @param unknown $reallSunTimestamp
     */
    public function getRealSunTime($pingSunTimestamp)
    {
        $map = [
            '1-01' => ['-', 3, 9],
            '1-02' => ['-', 3, 38],
            '1-03' => ['-', 4, 6],
            '1-04' => ['-', 4, 33],
            '1-05' => ['-', 5, 1],
            '1-06' => ['-', 5, 27],
            '1-07' => ['-', 5, 54],
            '1-08' => ['-', 6, 20],
            '1-09' => ['-', 6, 45],
            '1-10' => ['-', 7, 10],
            '1-11' => ['-', 7, 35],
            '1-12' => ['-', 7, 59],
            '1-13' => ['-', 8, 22],
            '1-14' => ['-', 8, 45],
            '1-15' => ['-', 9, 7],
            '1-16' => ['-', 9, 28],
            '1-17' => ['-', 9, 49],
            '1-18' => ['-', 10, 9],
            '1-19' => ['-', 10, 28],
            '1-20' => ['-', 10, 47],
            '1-21' => ['-', 11, 5],
            '1-22' => ['-', 11, 22],
            '1-23' => ['-', 11, 38],
            '1-24' => ['-', 11, 54],
            '1-25' => ['-', 12, 8],
            '1-26' => ['-', 12, 22],
            '1-27' => ['-', 12, 35],
            '1-28' => ['-', 12, 59],
            '1-29' => ['-', 13, 10],
            '1-30' => ['-', 13, 19],
            '1-31' => ['-', 13, 37],
            '2-01' => ['-', 13, 44],
            '2-02' => ['-', 13, 50],
            '2-03' => ['-', 13, 56],
            '2-04' => ['-', 14, 1],
            '2-05' => ['-', 14, 5],
            '2-06' => ['-', 14, 9],
            '2-07' => ['-', 14, 11],
            '2-08' => ['-', 14, 13],
            '2-09' => ['-', 14, 14],
            '2-10' => ['-', 14, 15],
            '2-11' => ['-', 14, 14],
            '2-12' => ['-', 14, 13],
            '2-13' => ['-', 14, 11],
            '2-14' => ['-', 14, 8],
            '2-15' => ['-', 14, 5],
            '2-16' => ['-', 14, 1],
            '2-17' => ['-', 13, 56],
            '2-18' => ['-', 13, 51],
            '2-19' => ['-', 13, 44],
            '2-20' => ['-', 13, 38],
            '2-21' => ['-', 13, 30],
            '2-22' => ['-', 13, 22],
            '2-23' => ['-', 13, 13],
            '2-24' => ['-', 11, 4],
            '2-25' => ['-', 12, 54],
            '2-26' => ['-', 12, 43],
            '2-27' => ['-', 12, 32],
            '2-28' => ['-', 12, 21],
            '2-29' => ['-', 12, 8],
            '3-01' => ['-', 11, 56],
            '3-02' => ['-', 11, 43],
            '3-03' => ['-', 11, 29],
            '3-04' => ['-', 11, 15],
            '3-05' => ['-', 11, 1],
            '3-06' => ['-', 10, 47],
            '3-07' => ['-', 10, 32],
            '3-08' => ['-', 10, 16],
            '3-09' => ['-', 10, 1],
            '3-10' => ['-', 9, 45],
            '3-11' => ['-', 9, 28],
            '3-12' => ['-', 9, 12],
            '3-13' => ['-', 8, 55],
            '3-14' => ['-', 8, 38],
            '3-15' => ['-', 8, 21],
            '3-16' => ['-', 8, 4],
            '3-17' => ['-', 7, 46],
            '3-18' => ['-', 7, 29],
            '3-19' => ['-', 7, 11],
            '3-20' => ['-', 6, 53],
            '3-21' => ['-', 6, 35],
            '3-22' => ['-', 6, 17],
            '3-23' => ['-', 5, 58],
            '3-24' => ['-', 5, 40],
            '3-25' => ['-', 5, 22],
            '3-26' => ['-', 5, 4],
            '3-27' => ['-', 4, 45],
            '3-28' => ['-', 4, 27],
            '3-29' => ['-', 4, 9],
            '3-30' => ['-', 3, 51],
            '3-31' => ['-', 3, 33],
            '4-01' => ['-', 3, 16],
            '4-02' => ['-', 2, 58],
            '4-03' => ['-', 2, 41],
            '4-04' => ['-', 2, 24],
            '4-05' => ['-', 2, 7],
            '4-06' => ['-', 1, 50],
            '4-07' => ['-', 1, 33],
            '4-08' => ['-', 1, 17],
            '4-09' => ['-', 1, 1],
            '4-10' => ['+', 0, 46],
            '4-11' => ['+', 0, 30],
            '4-12' => ['+', 0, 16],
            '4-13' => ['+', 0, 1],
            '4-14' => ['+', 0, 13],
            '4-15' => ['+', 0, 27],
            '4-16' => ['+', 0, 41],
            '4-17' => ['+', 0, 54],
            '4-18' => ['+', 1, 6],
            '4-19' => ['+', 1, 19],
            '4-20' => ['+', 1, 31],
            '4-21' => ['+', 1, 42],
            '4-22' => ['+', 1, 53],
            '4-23' => ['+', 2, 4],
            '4-24' => ['+', 2, 14],
            '4-25' => ['+', 2, 23],
            '4-26' => ['+', 2, 33],
            '4-27' => ['+', 2, 41],
            '4-28' => ['+', 2, 49],
            '4-29' => ['+', 2, 57],
            '4-30' => ['+', 3, 4],
            '5-01' => ['+', 1, 10],
            '5-02' => ['+', 3, 16],
            '5-03' => ['+', 3, 21],
            '5-04' => ['+', 3, 26],
            '5-05' => ['+', 3, 30],
            '5-06' => ['+', 3, 37],
            '5-07' => ['+', 3, 36],
            '5-08' => ['+', 3, 39],
            '5-09' => ['+', 3, 40],
            '5-10' => ['+', 3, 42],
            '5-11' => ['+', 3, 42],
            '5-12' => ['+', 3, 42],
            '5-13' => ['+', 3, 42],
            '5-14' => ['+', 3, 41],
            '5-15' => ['+', 3, 39],
            '5-16' => ['+', 3, 37],
            '5-17' => ['+', 3, 34],
            '5-18' => ['+', 3, 31],
            '5-19' => ['+', 3, 27],
            '5-20' => ['+', 3, 23],
            '5-21' => ['+', 3, 18],
            '5-22' => ['+', 3, 13],
            '5-23' => ['+', 3, 7],
            '5-24' => ['+', 3, 1],
            '5-25' => ['+', 2, 54],
            '5-26' => ['+', 2, 47],
            '5-27' => ['+', 2, 39],
            '5-28' => ['+', 2, 31],
            '5-29' => ['+', 2, 22],
            '5-30' => ['+', 2, 13],
            '5-31' => ['+', 2, 4],
            '6-01' => ['+', 1, 54],
            '6-02' => ['+', 1, 44],
            '6-03' => ['+', 1, 34],
            '6-04' => ['+', 1, 23],
            '6-05' => ['+', 1, 12],
            '6-06' => ['+', 1, 0],
            '6-07' => ['+', 0, 48],
            '6-08' => ['+', 0, 36],
            '6-09' => ['+', 0, 24],
            '6-10' => ['+', 0, 12],
            '6-11' => ['+', 0, 1],
            '6-12' => ['+', 0, 14],
            '6-13' => ['+', 0, 39],
            '6-14' => ['+', 0, 52],
            '6-15' => ['-', 1, 5],
            '6-16' => ['-', 1, 18],
            '6-17' => ['-', 1, 31],
            '6-18' => ['-', 1, 45],
            '6-19' => ['-', 1, 57],
            '6-20' => ['-', 2, 10],
            '6-21' => ['-', 2, 23],
            '6-22' => ['-', 2, 36],
            '6-23' => ['-', 2, 48],
            '6-24' => ['-', 3, 1],
            '6-25' => ['-', 3, 13],
            '6-26' => ['-', 3, 25],
            '6-27' => ['-', 3, 37],
            '6-28' => ['-', 3, 49],
            '6-29' => ['-', 4, 0],
            '6-30' => ['-', 4, 11],
            '7-01' => ['-', 4, 22],
            '7-02' => ['-', 4, 33],
            '7-03' => ['-', 4, 43],
            '7-04' => ['-', 4, 53],
            '7-05' => ['-', 5, 2],
            '7-06' => ['-', 5, 11],
            '7-07' => ['-', 5, 20],
            '7-08' => ['-', 5, 28],
            '7-09' => ['-', 5, 36],
            '7-10' => ['-', 5, 43],
            '7-11' => ['-', 5, 50],
            '7-12' => ['-', 5, 56],
            '7-13' => ['-', 6, 2],
            '7-14' => ['-', 6, 8],
            '7-15' => ['-', 6, 12],
            '7-16' => ['-', 6, 16],
            '7-17' => ['-', 6, 20],
            '7-18' => ['-', 6, 23],
            '7-19' => ['-', 6, 25],
            '7-20' => ['-', 6, 27],
            '7-21' => ['-', 6, 29],
            '7-22' => ['-', 6, 29],
            '7-23' => ['-', 6, 29],
            '7-24' => ['-', 6, 29],
            '7-25' => ['-', 6, 28],
            '7-26' => ['-', 6, 26],
            '7-27' => ['-', 6, 24],
            '7-28' => ['-', 6, 21],
            '7-29' => ['-', 6, 17],
            '7-30' => ['-', 6, 13],
            '7-31' => ['-', 6, 8],
            '8-01' => ['-', 6, 3],
            '8-02' => ['-', 5, 57],
            '8-03' => ['-', 5, 51],
            '8-04' => ['-', 5, 44],
            '8-05' => ['-', 5, 36],
            '8-06' => ['-', 5, 28],
            '8-07' => ['-', 5, 19],
            '8-08' => ['-', 5, 10],
            '8-09' => ['-', 5, 0],
            '8-10' => ['-', 4, 50],
            '8-11' => ['-', 4, 39],
            '8-12' => ['-', 4, 27],
            '8-13' => ['-', 4, 15],
            '8-14' => ['-', 4, 2],
            '8-15' => ['-', 3, 49],
            '8-16' => ['-', 3, 36],
            '8-17' => ['-', 3, 21],
            '8-18' => ['-', 3, 7],
            '8-19' => ['-', 2, 51],
            '8-20' => ['-', 2, 36],
            '8-21' => ['-', 2, 20],
            '8-22' => ['-', 2, 3],
            '8-23' => ['-', 1, 47],
            '8-24' => ['-', 1, 29],
            '8-25' => ['-', 1, 12],
            '8-26' => ['+', 0, 54],
            '8-27' => ['+', 0, 35],
            '8-28' => ['+', 0, 17],
            '8-29' => ['+', 0, 2],
            '8-30' => ['+', 0, 21],
            '8-31' => ['+', 0, 41],
            '9-01' => ['+', 1, 0],
            '9-02' => ['+', 1, 20],
            '9-03' => ['+', 1, 40],
            '9-04' => ['+', 2, 1],
            '9-05' => ['+', 2, 21],
            '9-06' => ['+', 2, 42],
            '9-07' => ['+', 3, 3],
            '9-08' => ['+', 3, 3],
            '9-09' => ['+', 3, 24],
            '9-10' => ['+', 3, 45],
            '9-11' => ['+', 4, 6],
            '9-12' => ['+', 4, 27],
            '9-13' => ['+', 4, 48],
            '9-14' => ['+', 5, 10],
            '9-15' => ['+', 5, 31],
            '9-16' => ['+', 5, 53],
            '9-17' => ['+', 6, 14],
            '9-18' => ['+', 6, 35],
            '9-19' => ['+', 6, 57],
            '9-20' => ['+', 7, 18],
            '9-21' => ['+', 7, 39],
            '9-22' => ['+', 8, 0],
            '9-23' => ['+', 8, 21],
            '9-24' => ['+', 8, 42],
            '9-25' => ['+', 9, 2],
            '9-26' => ['+', 9, 22],
            '9-27' => ['+', 9, 42],
            '9-28' => ['+', 10, 2],
            '9-29' => ['+', 10, 21],
            '9-30' => ['+', 10, 40],
            '10-01' => ['+', 10, 59],
            '10-02' => ['+', 11, 18],
            '10-03' => ['+', 11, 36],
            '10-04' => ['+', 11, 36],
            '10-05' => ['+', 11, 53],
            '10-06' => ['+', 12, 11],
            '10-07' => ['+', 12, 28],
            '10-08' => ['+', 12, 44],
            '10-09' => ['+', 12, 60],
            '10-10' => ['+', 13, 16],
            '10-11' => ['+', 13, 16],
            '10-12' => ['+', 13, 31],
            '10-13' => ['+', 13, 45],
            '10-14' => ['+', 13, 59],
            '10-15' => ['+', 14, 13],
            '10-16' => ['+', 14, 26],
            '10-17' => ['+', 14, 38],
            '10-18' => ['+', 14, 50],
            '10-19' => ['+', 15, 1],
            '10-20' => ['+', 15, 12],
            '10-21' => ['+', 11, 21],
            '10-22' => ['+', 15, 31],
            '10-23' => ['+', 15, 40],
            '10-24' => ['+', 15, 48],
            '10-25' => ['+', 15, 55],
            '10-26' => ['+', 16, 1],
            '10-27' => ['+', 16, 7],
            '10-28' => ['+', 16, 12],
            '10-29' => ['+', 16, 16],
            '10-30' => ['+', 16, 20],
            '10-31' => ['+', 16, 22],
            '11-01' => ['+', 16, 24],
            '11-02' => ['+', 16, 25],
            '11-03' => ['+', 16, 25],
            '11-04' => ['+', 16, 24],
            '11-05' => ['+', 16, 23],
            '11-06' => ['+', 16, 21],
            '11-07' => ['+', 16, 17],
            '11-08' => ['+', 16, 13],
            '11-09' => ['+', 16, 9],
            '11-10' => ['+', 16, 3],
            '11-11' => ['+', 15, 56],
            '11-12' => ['+', 15, 49],
            '11-13' => ['+', 15, 41],
            '11-14' => ['+', 15, 32],
            '11-15' => ['+', 15, 22],
            '11-16' => ['+', 15, 11],
            '11-17' => ['+', 14, 60],
            '11-18' => ['+', 14, 47],
            '11-19' => ['+', 14, 34],
            '11-20' => ['+', 14, 20],
            '11-21' => ['+', 14, 6],
            '11-22' => ['+', 13, 50],
            '11-23' => ['+', 13, 34],
            '11-24' => ['+', 13, 17],
            '11-25' => ['+', 12, 59],
            '11-26' => ['+', 12, 40],
            '11-27' => ['+', 12, 21],
            '11-28' => ['+', 12, 1],
            '11-29' => ['+', 11, 40],
            '11-30' => ['+', 11, 18],
            '12-01' => ['+', 10, 56],
            '12-02' => ['+', 10, 33],
            '12-03' => ['+', 10, 9],
            '12-04' => ['+', 9, 45],
            '12-05' => ['+', 9, 21],
            '12-06' => ['+', 8, 55],
            '12-07' => ['+', 8, 29],
            '12-08' => ['+', 8, 3],
            '12-09' => ['+', 7, 36],
            '12-10' => ['+', 7, 9],
            '12-11' => ['+', 6, 42],
            '12-12' => ['+', 6, 14],
            '12-13' => ['+', 5, 46],
            '12-14' => ['+', 5, 17],
            '12-15' => ['+', 4, 48],
            '12-16' => ['+', 4, 19],
            '12-17' => ['+', 3, 50],
            '12-18' => ['+', 3, 21],
            '12-19' => ['+', 2, 51],
            '12-20' => ['+', 2, 22],
            '12-21' => ['+', 1, 52],
            '12-22' => ['+', 1, 22],
            '12-23' => ['+', 0, 52],
            '12-24' => ['+', 0, 23],
            '12-25' => ['+', 0, 7],
            '12-26' => ['+', 0, 37],
            '12-27' => ['-', 1, 6],
            '12-28' => ['-', 1, 36],
            '12-29' => ['-', 2, 5],
            '12-30' => ['-', 2, 34],
            '12-31' => ['-', 3, 3],
        ];
        //根据平太阳时的时间戳，计算出月份和日期
        $month = date('m', $pingSunTimestamp);
        $day = date('d', $pingSunTimestamp);
        //转换$month,保证前面没有0
        $month = ltrim($month, '0');
        //从map中查到对应的偏移量
        $deltaParam = $map[$month . '-' . $day] ?? false;

        if (empty($deltaParam)) {
            return false;
        }
        $realSunTimestamp = 0;
        if ($deltaParam[0] == '+') {
            $realSunTimestamp = $pingSunTimestamp + ($deltaParam[1] * 60) + $deltaParam[2];
        } else {
            $realSunTimestamp = $pingSunTimestamp - ($deltaParam[1] * 60) - $deltaParam[2];
        }
        $realSunTime = date('Y-m-d H:i', $realSunTimestamp);
        return $realSunTime;
    }

    /*
   * 获取真太阳时
   */
    public function getPingSunTime($longitude, $beijingTimestamp)
    {
        $beijingLongitude = 120;
        $deltaLongitude = $longitude - $beijingLongitude;
        $deltaSeconds = 240 * $deltaLongitude;
        $pingSunTimestamp = $beijingTimestamp + $deltaSeconds;
        $pingSunTime = date('Y-m-d H:i', $pingSunTimestamp);
        return $pingSunTime;
    }

}

//$lunar = new Lunar();
//$month = $lunar->convertLunarToSolar(date('Y'),date('m'),date('d'));
//print_r($month);