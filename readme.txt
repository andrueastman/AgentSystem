Changes:
Agent System
1. added pdf support for invoicing and receipts
2. completed invoicing module
3. completed receipt module
4. quotation module

Admin Side
1. completed products module
2. 


$this->db->select('title, content, date, hyperlink');
$this->db->where("title LIKE '%$query%' OR content LIKE '%$query%'");