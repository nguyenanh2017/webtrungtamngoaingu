<?php 
	// hien thi menu chon cac thu muc hien co o he thong luc tao thu muc moi(thong hop thoai select)
	function folderMulti($data,$parent_id = 0,$str = ""){
		foreach($data as $val){
			$id = $val["id_fd"];
			$name = $val["name_fd"];

			if($val["id_parent"] == $parent_id){
				echo '<option value='.$id.'>'.$str.$name.'</option>';
				folderMulti($data,$id,$str.">>>>| ");
			}


		}
	}
			
	// show cac thu muc dang co ra de chinh sua hoac xoa  
	function showFolderMulti($data,$parent_id=1,$str=""){

			foreach($data as $val){
				if($val['id_parent'] == $parent_id){
					echo "<a onclick='op(this)' id='".$val['id_fd']."'"."class="."'showFolderMulti'".">".$str."Thư mục: ".$val['name_fd']."</a>"."<div id='s_f'></div>".'<br>';
		
					showFolderMulti($data,$val['id_fd'],$str.'>>>>');
				}
			}
	}

	//tim cha la ai
	function findParent($data,$child){
		if($child > 1){
			foreach($data as $val){
				if($val['id_fd'] == $child){
					return $val['id_parent'];
				}
			}
		}
		return 0;
	}
	function checkChild($data,$my){
		if($my > 1){
			foreach($data as $val){
				if($val['id_parent'] == $my)
					{
						return $val['id_fd'];
					}
			}
			return 0;
		}

	}

	//ham tra ve 1 duong dan tuyet doi khi co mang cac folder + id thu muc de duong dan tro toi
	function folder_url($data,$child){
		// ham nay khi cug cap 1 thu muc con vao se tu truy xuat ra duoc cac thu muc cha cua bo de duoc mot duong dan tuyet doi bat dau tu root
		$url ="public";
		if($child != 1){ //neu no khac 1 la phai tim thu muc cha
			// tim cac cha cua thu muc $child => mang a
			$a = array();
			$a[0] = findParent($data,$child);
			$i=1;
			while(true){
				// dk thoat
				if(findParent($data,$a[$i-1]) == 0) break;
				$a[$i] = findParent($data,$a[$i-1]);
				$i++;
			}
			//lay ra ten cac thag cha cua folder bang cach duyet mang a nguoc tru ra phan tu cuoi cua mang
			for($j=$i-2;$j>=0;$j--){
				foreach($data as $val){
					if($val['id_fd'] == $a[$j]){
						$url = $url."/".str_replace(' ','',$val['name_fd']);
					}
				}
			}
			// lay ten thu muc ra
			foreach($data as $val){
				if($val['id_fd'] == $child){
					$end = str_replace(' ','',$val['name_fd']); //ham nay de car bo cac khoang trang trong chuoi di de tao thanh duong dan
				}
			}
		}
		if(isset($end)){
		return $url."/".$end;
		}
		else return $url;
	}
	// ham show cac folder hien co trong he thong 1 cach dep mat
	function showTree($Folder_Root){
        //lay ra root
        //$folder = Folder::where('id_parent','=',Null)->get();
        $folder = $Folder_Root;
        $tree='<ul>';
        foreach($folder as $f){
            $tree .='<li class="coCon"><span  onclick="op(this)" class="glyphicon glyphicon-folder-close"></span><a class="'.$f->id_fd.'" onclick="ch(this)">'.'  '.$f->name_fd.'</a>';
            //dem co bao nhieu con or con no co hay khong
            if (count($f->is_childs)){
            	//echo count($f->is_childs);
                // neu con thy truyen cha vao showChild de tim cac con cho den het
                $tree .= showChild($f);
            }
        }
        $tree .= '</ul>';
        echo $tree;
    }

    function showChild($Folder){

        // nhan vao la mot doi tuong cha => mang cac doi tuong con cua cha hien co
        //return $Folder;
        
        
        $h = '<ul>';
        //for doi tuong cha => con hien co thanh tuong doi tuong $arr

        foreach($Folder->is_childs as $arr){
            //kiem tra xem doi tuong $arr con co con hay khong
            //neu con thy show ten doi tuong va goi lai ham showChild truyen vao doi truong do
            //neu khong con thy la thu muc cung nen chi hien thi ten ra roi dong the li lai..
            if(count($arr->is_childs)){
            //echo 'doi tuong'.$arr->name_fd.'con co: '.count($arr->is_childs).'con<br>';
            //id con de gach dau tien cac gach"---"
            //class coCon de ke cac border-left
            $h .='<li id="con" class="coCon"><span onclick="op(this)" class="glyphicon glyphicon-folder-close"></span><a class="'.$arr->id_fd.'" onclick="ch(this)">'.$arr->name_fd.'</a>';
            $h .=showChild($arr);
            }else{

                $h .= '<li id="con"><span class="glyphicon glyphicon-folder-close"><a class="'.$arr->id_fd.'" onclick="ch(this)">'.$arr->name_fd.'</a>';
                $h .= '</li>';
            }
        }
        $h .= '</ul>';
        return $h;
    }
	
?>