<?php
class Song {
    private $artistName;
    private $songName;
    private $songLength;

    /**
     * Song constructor.
     * @param $artistName
     * @param $songName
     * @param $songLength
     * @throws Exception
     */
    public function __construct($artistName, $songName, $songLength)
    {
        if ($artistName!=null&&$songName!=null&&$songLength!=null) {
            $this->setArtistName($artistName);
            $this->setSongName($songName);
            $this->setSongLength($songLength);
        } else{
            throw new Exception("Invalid song.");
        }
    }

    /**
     * @return mixed
     */
    public function getArtistName()
    {
        return $this->artistName;
    }

    /**
     * @param mixed $artistName
     * @throws Exception
     */
    private function setArtistName($artistName): void
    {
        if (strlen($artistName)>=3&&strlen($artistName)<=20){
            $this->artistName = $artistName;
        } else{
            throw new Exception("Artist name should be between 3 and 20 symbols.");
        }
    }

    /**
     * @return mixed
     */
    public function getSongName()
    {
        return $this->songName;
    }

    /**
     * @param mixed $songName
     * @throws Exception
     */
    private function setSongName($songName): void
    {
        if (strlen($songName)>=3&&strlen($songName)<=30){
            $this->songName = $songName;
        }else{
            throw new Exception("Song name should be between 3 and 30 symbols.");
        }
    }

    /**
     * @return mixed
     */
    public function getSongLength()
    {

        return $this->songLength;
    }

    /**
     * @param mixed $songLength
     * @throws Exception
     */
    private function setSongLength($songLength): void
    {
        $inputLength = explode(":",$songLength);
        if (strpos($songLength,':')!==false) {
            if (is_numeric($inputLength[0])&&is_numeric($inputLength[1])) {
                $minutes = intval($inputLength[0]);
                $seconds = intval($inputLength[1]);
                if ($minutes >= 0 && $minutes <= 14) {
                    if ($seconds >= 0 && $seconds <= 59) {
                        $this->songLength = $songLength;
                    } else {
                        throw new Exception("Song seconds should be between 0 and 59.");
                    }
                } else {
                    throw new Exception("Song minutes should be between 0 and 14.");
                }
            } else{
                throw new Exception("Invalid song length.");
            }
        } else{
            throw new Exception("Invalid song length.");
        }
    }

    public function addSong($songsLengths, $addLength){
        $sL = explode(":", $songsLengths);
        $hS = $sL[0];
        $mS= $sL[1];
        $sS = $sL[2];
        $aL = explode(":", $addLength);
        $mA = $aL[0];
        $sA = $aL[1];
        $sP = ($sS+$sA)%60;
        $mP = ($mS+$mA+intval(($sS+$sA)/60))%60;
        $hP = $hS+intval(($mS+$mA+intval(($sS+$sA)/60))/60);
        $plLength=$hP.":".$mP.":".$sP;
        return $plLength;
    }
}
$n = intval(readline());
$playlistL = "0:0:0";
$songCount = 0;
for ($i = 0; $i <$n; $i ++){
    $input = explode(";", readline());
    $artistN = $input[0];
    $songN = $input[1];
    $length = $input[2];
    try {
        $song = new Song($artistN, $songN, $length);
        $playlistL = $song->addSong($playlistL,$length);
        $songCount+=1;
        echo "Song added.".PHP_EOL;
    } catch (Exception $e) {
        echo $e->getMessage().PHP_EOL;
    }
}
$out = explode(":",$playlistL);
$ho = $out[0];
$mo = sprintf("%02d",$out[1]);
$so = sprintf("%02d",$out[2]);
echo "Songs added: $songCount".PHP_EOL;
echo "Playlist length: {$ho}h {$mo}m {$so}s".PHP_EOL;