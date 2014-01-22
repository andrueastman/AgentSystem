Changes:
still under construction


$this->db->select('title, content, date, hyperlink');
$this->db->where("title LIKE '%$query%' OR content LIKE '%$query%'");