<?php
class MatchModel  extends  Model{
	protected $tableName = 'match';
	public function addRecord($teama,$teamb,$match_id=0) {
		$data['MatchID'] = $match_id;
		$data['teama'] = $teama;
		$data['teamb'] = $teamb;
		$data['score'] = "-";
		$this->data($data)->add();
	}
	public function updateScore($match_id,$score) {
		$condition['MatchID'] = $match_id;
		$data['score'] = $score;
		$this->where($condition)->save($data);
	}

	public function getFinishCount() {
		return count($this->where('score!="-"')->select());
	}
	public function getAll() {
		return $this->select();
	}

}	