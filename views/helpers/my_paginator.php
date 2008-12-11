<?php
class MyPaginatorHelper extends AppHelper {
	public $helpers = array('Paginator');

	// counterの日本語表記
	function counter()
	{
		return $this->Paginator->counter(array(
			'format' => '%pages%ページ中 %page%ページ目, 全%count%件中 %start%件目から %end%件目の %current%件を表示中'
		));
	}

	// 表示件数の選択
	function limit($format = '表示件数[&nbsp;%currents%&nbsp;]', $currents = array(20, 50, 100), $separator = '&nbsp;')
	{
		$model = $this->Paginator->defaultModel();
		$a = array();
		foreach ($currents as $current) {
			if ($current == $this->Paginator->params['paging'][$model]['options']['limit']) {
				$a[] = '<em>' . $current . '</em>';
			} else {
				$a[] = $this->Paginator->link($current, array('limit' => $current));
			}
			if ($current >= intval($this->Paginator->params['paging'][$model]['count'])) {
				break;
			}
		}
		return r('%currents%', implode($separator, $a), $format);
	}

	// ページの日本語版
	function pages()
	{
		$first	 = $this->Paginator->first('<<最初');
		$prev	 = $this->Paginator->prev('<前');
		$numbers = $this->Paginator->numbers();
		$next	 = $this->Paginator->next('次>');
		$last	 = $this->Paginator->last('最後>>');

		return sprintf('%s %s | %s | %s %s', $first, $prev, $numbers, $next, $last);
	}

	// 昇順・降順のとき矢印をつける
	function sort($title, $key = null, $options = array())
	{
		if ($key) {
			$sortKey = $this->Paginator->sortKey();
			$sortDir = $this->Paginator->sortDir();
			if ($key === $sortKey) {
				$title .= ($sortDir === 'asc') ? '↑': '↓';
			}
		}
		return $this->Paginator->sort($title, $key, $options);
	}
}
?>